<?php
namespace App\Controllers;

use App\Models\User;


class SingUserController extends BaseController{

    public function registerUser() {
        return $this->renderHTML('/registers/singin.twig');
    }

    public function addNewUser($postData) {

        // Validation here

        $user = new User();
        $user->name = $postData['name'];
        $user->lastName = $postData['lastName'];
        $user->user = $postData['user'];
        $user->email = $postData['email'];
        $user->password = password_hash($postData['password'], PASSWORD_DEFAULT);
        $user->image = 'https://ui-avatars.com/api/?name='.str_replace(' ', '', $user->name).'+'.str_replace(' ', '',$user->lastName ).'&size=456&background=random&rounded=true';
        $user->description = "Estoy usando Senati News :D";
        $user->dni = $postData['dni'];
        $user->save();
    }
    public function validateUser($request){
        $postData = $request->getParsedBody();
        // echo json_encode(array('validate'=> false, 'tipo' => 'es una prueba'));
        $checkUser = User::where('user', $postData['user'])->first();
        $checkEmail =  User::where('email', $postData['email'])->first();
        $checkDni =  User::where('dni', $postData['dni'])->first();

        $validate = false; $msg = null;

        if ($checkUser && $checkEmail)
        {
            $msg = "Usuario y correo ya en uso pruebe de nuevo";
        }
        elseif($checkDni)
        {
            $msg = "Ya existe una cuenta con este D.N.I."
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
        echo json_encode(array('validate'=> $validate, 'msg' => $msg));
        return $this->renderHTML('/empty.twig');

    }
}