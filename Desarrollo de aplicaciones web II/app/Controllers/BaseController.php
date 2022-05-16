<?php

namespace App\Controllers;

use Laminas\Diactoros\Response\RedirectResponse;
use \Twig_Loader_Filesystem;
use Laminas\Diactoros\Response\HtmlResponse;
class BaseController {
    protected $templateEngine;

    public function __construct() {
        $loader = new Twig_Loader_Filesystem('../views');
        $this->templateEngine = new \Twig_Environment($loader, array(
            'debug' => true,
            'cache' => false,
        ));
        $this->templateEngine->addExtension(new \Twig\Extension\DebugExtension());
    }

    public function renderHTML($fileName, $data = []) {
        return new HtmlResponse($this->templateEngine->render($fileName, $data));
    }

    public function checkSession(){
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['pass'])){
            return false;
        }
        return true;
    }
}