<?php

use App\Controller\HomeController;
use App\Controller\SecurityController;
use FastRoute\RouteCollector;


return function(RouteCollector $r) {
    $r->addRoute('GET', '/',array(new HomeController($_GET["twig"]), "index",[]));
    $r->addRoute('GET', '/learning',array(new HomeController($_GET["twig"]), "Learning",[]));
};
