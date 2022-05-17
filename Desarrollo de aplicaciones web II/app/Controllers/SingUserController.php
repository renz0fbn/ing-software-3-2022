<?php
namespace App\Controllers;

use App\Models\User;


class SingUserController extends BaseController{

    public function registerUser() {
        // Renderizar pagina de la carpeta Views/SingUser
        return $this->renderHTML('/registers/singin.twig');
    }

    public function addNewUser($postData) {

        // Crear un nuevo objeto de la clase User

        $user = new User();
        $user->name = $postData['name'];
        $user->lastName = $postData['lastName'];
        $user->user = $postData['user'];
        $user->email = $postData['email'];
        $user->password = password_hash($postData['password'], PASSWORD_DEFAULT);
        $user->image = 'https://ui-avatars.com/api/?name='.str_replace(' ', '', $user->name).'+'.str_replace(' ', '',$user->lastName ).'&size=456&background=random&rounded=true';  // Generar imagen de perfil API UiAvatars
        $user->description = "Estoy usando Senati News :D";
        $user->dni = $postData['dni'];
        $user->save();  // Guardar el objeto en la base de datos
    }
    public function validateUser($request){
        $postData = $request->getParsedBody();  // Obtener los datos del formulario
        // Buscar coencidencias en la base de datos
        $checkUser = User::where('user', $postData['user'])->first();
        $checkEmail =  User::where('email', $postData['email'])->first();
        $checkDni =  User::where('dni', $postData['dni'])->first();

        $validate = false; $msg = null;

        // Checkear resultados
        if ($checkUser && $checkEmail)
        {
            $msg = "Usuario y correo ya en uso pruebe de nuevo";
        }
        elseif($checkDni)
        {
            $msg = "Ya existe una cuenta con este D.N.I.";
        }
        elseif($checkUser)
        {

            $msg = "Usuario ya en uso pruebe de nuevo";
        }
        elseif ($checkEmail)
        {
            $user = true;
            $msg = "Correo ya en uso pruebe de nuevo";
        }
        else
        {
            $this->addNewUser($postData);
            $validate = true;
            $msg = "Cuenta creada correctamente";
        }

        // Retornar resultados
        echo json_encode(array('validate'=> $validate, 'msg' => $msg));
        return $this->renderHTML('/empty.twig');

    }
}