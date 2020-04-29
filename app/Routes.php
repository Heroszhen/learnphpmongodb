<?php

use App\Controller\HomeController;
use App\Controller\SecurityController;
use App\Controller\AdminreservationController;
use FastRoute\RouteCollector;


return function(RouteCollector $r) {
    $r->addRoute('GET', '/',array(new HomeController($_GET["twig"]), "index",[]));
    $r->addRoute('GET', '/learning',array(new HomeController($_GET["twig"]), "Learning",[]));
    $r->addRoute('GET', '/reservation',array(new HomeController($_GET["twig"]), "reservation",[]));
    $r->addRoute('POST', '/reservation',array(new HomeController($_GET["twig"]), "reservation",[$_POST]));
    
    $r->addRoute('GET', '/admin/reservation',array(new AdminreservationController($_GET["twig"]), "index",[]));
    $r->addRoute('GET', '/admin/reservation/supprimerreservation/{id:.+}',array(new AdminreservationController($_GET["twig"]), "deleteOneBooking",[$_SERVER['REQUEST_URI']]));
    $r->addRoute('GET', '/admin/reservation/modifierreservation/{id:.+}',array(new AdminreservationController($_GET["twig"]), "editOneBooking",[$_SERVER['REQUEST_URI']]));
    $r->addRoute('POST', '/admin/reservation/modifierreservation/{id:.+}',array(new AdminreservationController($_GET["twig"]), "editOneBooking",[$_SERVER['REQUEST_URI'],$_POST]));
    
    $r->addRoute('GET', '/login',array(new HomeController($_GET["twig"]), "login",[]));
};
