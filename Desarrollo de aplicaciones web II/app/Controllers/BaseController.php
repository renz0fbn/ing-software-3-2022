<?php

namespace App\Controllers;

use Twig\Extra\String\StringExtension;
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
        $this->templateEngine->addExtension(new \Twig\Extension\DebugExtension());     // dumb funciton to debug twig
        $this->templateEngine->addExtension(new StringExtension());                    // |u.truncate agregar
    }

    public function renderHTML($fileName, $data = []) {     // Funcion para renderizar una pagina html, con twig template
        return new HtmlResponse($this->templateEngine->render($fileName, $data));
    }

    public function checkSession(){
        // Comprobar si hay un login correcto
        if (!isset($_COOKIE['user']) || !isset($_COOKIE['pass'])){
            return false;
        }
        return true;
    }
}