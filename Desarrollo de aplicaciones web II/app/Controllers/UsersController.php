<?php
namespace App\Controllers;

use App\Models\{User, aNew};
use Laminas\Diactoros\Response\RedirectResponse;

class UsersController extends BaseController {
    public function getAddUser() {
        // Renderizar la pagina
        return $this->renderHTML('addUser.twig');
    }

    public function getUser(){
        if(!$this->checkSession()){
            return new RedirectResponse('/');
        }
            // Buscar el usuario
            $user = User::where('id', $_GET['id'])->first();
            if($user){
                // Encontrar ultimas noticias
                $news = aNew::where('idUsuario',$_GET['id'])->latest()->get();
                // Si el usuario que se busca coencide con el usuario de la sesion
                if($_COOKIE['pass'] == $user->password && $_COOKIE['idUser'] == $user->id ){
                    // Renderizar la pagina para editar usuario y enviar datos
                    return $this->renderHTML('/main/myProfile.twig', [
                        'user' => $user,
                        'news' => $news
                    ]);
                }
                $user->password = null;
                $user->dni = null;
                // Renderizar la pagina para ver usuario y enviar datos
                return $this->renderHTML('/main/showUser.twig', [
                    'user' => $user,
                    'news' => $news
                ]);
            }

            return $this->renderHTML('404.html');   // Poner pag 404

    }

}