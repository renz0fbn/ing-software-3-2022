<?php
namespace App\Controllers;

use App\Models\User;
use Laminas\Diactoros\ServerRequest;

class LogInUserController extends BaseController{
    
    public function loginUser() {
        $newAccount = false;
        if(isset($_GET['new'])){
            if($_GET['new'] == 1){
                $newAccount = true;
            }
        }
        return $this->renderHTML('/registers/login.twig', [
            'newAccount' => $newAccount
        ]);
    }

    public function authUser(ServerRequest $request){
        $postData = $request->getParsedBody();
        $responseMessage = null;
        $auth = false;
        $user = User::where('user', $postData['user'])->first() ? : User::where('dni', $postData['user'])->first();     //Ternary operator
        if($user) {
            if (password_verify($postData['password'], $user->password)) {
                setcookie("user", $user->user, time() + (86400 * 30), "/");
                setcookie("idUser", $user->id, time() + (86400 * 30), "/");
                setcookie("pass", $user->password, time() + (86400 * 30), "/");
                $auth = true;
            } else {
                $responseMessage = 'Credenciales incorrectas';
            }
        }
        else {
            $responseMessage = 'Credenciales incorrectas';
        }
        echo json_encode(array('auth'=> $auth,'msg' => $responseMessage));
        return $this->renderHTML('/empty.twig');


    }
}