<?php

namespace App\Controllers;

use App\Models\aNew;
use Laminas\Diactoros\Response\RedirectResponse;

class IndexController extends BaseController {

    public function indexPage(){
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['pass'])){
            return new RedirectResponse('/login');
        }

        $news = aNew::latest()->limit(50)->join('Users', 'Users.id', '=', 'News.idUsuario')->select('News.*', 'Users.image')->get();
        return $this->renderHTML('main/index.twig', [
            'user' => $_COOKIE['user'],
            'news' => $news,
            'idUser' => $_COOKIE['idUser']
        ]);
    }
}