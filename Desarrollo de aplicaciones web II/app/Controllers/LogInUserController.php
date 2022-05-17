<?php
namespace App\Controllers;

use App\Models\User;
use Laminas\Diactoros\ServerRequest;

class LogInUserController extends BaseController{
    
    public function loginUser() {
        $newAccount = false;
        if(isset($_GET['new'])){    // Enseñar mensaje si se crea un usario nuevo
            if($_GET['new'] == 1){
                $newAccount = true;
            }
        }
        // Renderizar la pagina y enviar datos
        return $this->renderHTML('/registers/login.twig', [
            'newAccount' => $newAccount
        ]);
    }

    public function authUser(ServerRequest $request){
        $postData = $request->getParsedBody();
        $responseMessage = null;
        $auth = false;
        $user = User::where('user', $postData['user'])->first() ? : User::where('dni', $postData['user'])->first();     //Existe el usuario?
        if($user) {
            // Comparar contraseña
            if (password_verify($postData['password'], $user->password)) {
                // Establecer cookies
                setcookie("user", $user->user, time() + (86400 * 30), "/");
                setcookie("idUser", $user->id, time() + (86400 * 30), "/");
                setcookie("pass", $user->password, time() + (86400 * 30), "/");
                $auth = true;
            } else {
                // Mensaje de error
                $responseMessage = 'Credenciales incorrectas';
            }
        }
        else {
            // Mensaje de error
            $responseMessage = 'Credenciales incorrectas';
        }
        // Imprimir error en formato jason
        echo json_encode(array('auth'=> $auth,'msg' => $responseMessage));
        return $this->renderHTML('/empty.twig');


    }
}