<?php

ini_set('display_errors', 1);
ini_set('display_starup_error', 1);
error_reporting(E_ALL);


require_once '../vendor/autoload.php';

session_start();

$dotenv = new Dotenv\Dotenv(__DIR__ . '/..');
$dotenv->load();

use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => getenv('DB_DRIVER'),
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_NAME'),
    'username'  => getenv('DB_USER'),
    'password'  => getenv('DB_PASS'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
    'port'      => getenv('DB_PORT')
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();
$map->get('index', '/main', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexAction'
]);
$map->get('indexJobs', '/jobs', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'indexAction'
]);
$map->get('addJobs', '/jobs/add', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction'
]);
$map->get('deleteJobs', '/jobs/delete', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'deleteAction'
]);
$map->post('saveJobs', '/jobs/add', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction'
]);
$map->get('addUser', '/users/add', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'getAddUser'
]);
$map->post('saveUser', '/users/save', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'postSaveUser'
]);
$map->get('loginForm', '/cursophp/login', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogin'
]);
$map->post('auth', '/auth', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'postLogin'
]);
$map->get('admin', '/admin', [
    'controller' => 'App\Controllers\AdminController',
    'action' => 'getIndex',
    'auth' => true
]);

// Senati News map

$map->get('singIn', '/singin', [
    'controller' => 'App\Controllers\SingUserController',
    'action' => 'registerUser'
]);

$map->post('validateUser', '/singin/validate', [
   'controller' => 'App\Controllers\SingUserController',
   'action' => 'validateUser'
]);

$map->get('logIn', '/login', [
    'controller' => 'App\Controllers\LogInUserController',
    'action' => 'loginUser'
]);
$map->post('authLogIn', '/login/auth', [
    'controller' => 'App\Controllers\LogInUserController',
    'action' => 'authUser'
]);

$map->get('main', '/', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexPage'
]);

$map->get('logOut', '/logout', [
    'controller' => 'App\Controllers\ActionController',
    'action' => 'logOut'
]);
$map->get('renderCreateNew', '/create', [
    'controller' => 'App\Controllers\NewsController',
    'action' => 'renderCreateNew'
]);
$map->post('addNew', '/save/addNew', [
    'controller' => 'App\Controllers\NewsController',
    'action' => 'addNew'
]);
$map->get('showNew', '/new', [
    'controller' => 'App\Controllers\NewsController',
    'action' => 'showNew'
]);

$map->get('getUser', '/user', [
    'controller' => 'App\Controllers\UsersController',
    'action' => 'getUser'
]);

$map->post('uploadimage', '/save/profilePicture', [
    'controller' => 'App\Controllers\ActionController',
    'action' => 'uploadimage'
]);

$map->post('changeDescription', '/save/description', [
    'controller' => 'App\Controllers\ActionController',
    'action' => 'changeDescription'
]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if (!$route) {
    $noFound = fopen("../views/404.html","r");
    while(!feof($noFound)){
        echo fread($noFound, 4092);
    }
    http_response_code(404);

    
} else {
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];
    $needsAuth = $handlerData['auth'] ?? false;

    $sessionUserId = $_SESSION['userId'] ?? null;
    if ($needsAuth && !$sessionUserId) {
        echo 'Protected route';
        die;
    }

    $controller = new $controllerName;
    $response = $controller->$actionName($request);

    foreach($response->getHeaders() as $name => $values)
    {
        foreach($values as $value) {
            header(sprintf('%s: %s', $name, $value), false);
        }
    }
    http_response_code($response->getStatusCode());
    echo $response->getBody();
}