<?php

use App\Controller\HomeController;
use App\Controller\Security;
use FastRoute\RouteCollector;


return function(RouteCollector $r) {
    $r->addRoute('GET', '/',array(new HomeController($_GET["twig"]), "index",[]));
    
};