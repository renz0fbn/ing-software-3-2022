<?php
namespace App\Controllers;

use App\Models\{User, aNew};
use Laminas\Diactoros\Response\RedirectResponse;

class UsersController extends BaseController {
    public function getAddUser() {
        return $this->renderHTML('addUser.twig');
    }

    public function getUser(){
        if(!$this->checkSession()){
            return new RedirectResponse('/');
        }
            $user = User::where('id', $_GET['id'])->first();
            if($user){
                $news = aNew::where('idUsuario',$_GET['id'])->latest()->get();
                if($_COOKIE['pass'] == $user->password && $_COOKIE['idUser'] == $user->id ){

                    return $this->renderHTML('/main/myProfile.twig', [
                        'user' => $user,
                        'news' => $news
                    ]);
                }
                $user->password = null;
                return $this->renderHTML('/main/showUser.twig', [
                    'user' => $user,
                    'news' => $news
                ]);
            }

            return $this->renderHTML('404.html');   // Poner pag 404

    }

}