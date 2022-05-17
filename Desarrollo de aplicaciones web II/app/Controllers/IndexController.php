<?php

namespace App\Controllers;

use App\Models\aNew;
use Laminas\Diactoros\Response\RedirectResponse;

class IndexController extends BaseController {

    public function indexPage(){
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['pass'])){
            return new RedirectResponse('/login');   // Si no hay inicio de sesion, redirigir a login
        }

        // 50 primera noticias
        $news = aNew::latest()->limit(50)->join('Users', 'Users.id', '=', 'News.idUsuario')->select('News.*', 'Users.image')->get();

        // Renderizar la pagina y enviar datos
        return $this->renderHTML('main/index.twig', [
            'user' => $_COOKIE['user'],
            'news' => $news,
            'idUser' => $_COOKIE['idUser']
        ]);
    }
}