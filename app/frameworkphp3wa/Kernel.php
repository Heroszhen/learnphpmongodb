<?php

namespace Frameworkphp3wa;


use Frameworkphp3wa\Router;
use Frameworkphp3wa\Database\ConnectMysql;
use Twig;

class Kernel{
    public function run(){
        $loader = new Twig\Loader\FilesystemLoader(Dirname(Dirname(__DIR__)).'/templates'); 
        $twig = new Twig\Environment($loader, [
            'cache' => false,
        ]);

        $router = new Router();
        $dispatcher = $router->setRoutes($twig);
        $router->getRouter($twig,$dispatcher);
    }

    public function getDB(){
        return ConnectMysql::getDB();
    }
}
