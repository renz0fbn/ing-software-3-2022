<?php
namespace App\Controllers;

// Importar objetos
use App\Models\User;
use Laminas\Diactoros\Response\RedirectResponse;


class ActionController extends BaseController{

    public function logOut() {
        // Destruir la sesión y redirigir a la página de login
        unset($_SESSION['userId']);
        setcookie("user", "", time() - 1);
        setcookie("idUser", "", time() - 1);
        setcookie("pass", "", time() - 1);
        return new RedirectResponse('/login');
    }
    public function uploadimage($request){
        if ($request->getMethod() == 'POST') {
                $files = $request->getUploadedFiles();  // Obtener el archivo
                $pfp = $files['pfp'];

                $user= User::where('id', $_COOKIE['idUser'])->first();  // Obtener el usuario

                $filePath = "img/uploads/pfp/".$user->user.".png";      // Establecer ruta del archivo
                $pfp->moveTo($filePath);
                
                $user->image = "$filePath";
                $user->save();      // Guardar cambios

                return new RedirectResponse('/user?id='.$user->id);     // Regresar
        }

        return new RedirectResponse('/');
    }
    public function changeDescription($request){
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();      // Obtener descripcion
            $user= User::where('id', $_COOKIE['idUser'])->first();      // Encontrar usuario

            $user->description = $postData['biografia'];    // Guardar descripcion
            $user->save();     // Guardar cambios

            return new RedirectResponse('/user?id='.$user->id); // Regresar

        }

        return new RedirectResponse('/'); // Regresar al inicio si hay error
    }

}