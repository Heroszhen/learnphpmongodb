<?php

namespace Frameworkphp3wa;


use Frameworkphp3wa\Router;
use Twig;

class Kernel{
    function run(){
        $loader = new Twig\Loader\FilesystemLoader(Dirname(Dirname(__DIR__)).'/templates'); 
        $twig = new Twig\Environment($loader, [
            'cache' => false,
        ]);

        $router = new Router();
        $dispatcher = $router->setRoutes($twig);
        $router->getRouter($twig,$dispatcher);
    }
}