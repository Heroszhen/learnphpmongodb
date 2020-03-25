<?php

require_once "../vendor/autoload.php";

use Frameworkphp3wa\Kernel;

$kernel = new Kernel();
$kernel->run();
/*
require_once "../vendor/autoload.php";

use App\Controller\Home;
use App\Controller\Security;

$loader = new \Twig\Loader\FilesystemLoader(Dirname(__DIR__).'/templates'); 
$twig = new \Twig\Environment($loader, [
        'cache' => false,
]);

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/',array(new Home(), "index",[]));
    $r->addRoute('GET', '/contact', function() {
        echo 'Page de contact  <br /><a href="/myform">Remplir le formulaire</a>';
    });
    $r->addRoute('GET', '/myform', array(new Home(), "myForm",[]));
    $r->addRoute('POST', '/myform', array(new Home(), "myForm",[$_POST]));
    $r->addRoute('POST', '/getmyform', function() {
        echo "<h2>name : ".$_POST["name"]."</h2>";
    });
});

// Strip query string (?foo=bar) and decode URI
$uri = $_SERVER['REQUEST_URI'];
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

$routeInfo = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], rawurldecode($uri));
if($routeInfo[0] == FastRoute\Dispatcher::FOUND) {
    //var_dump($routeInfo[1]);
    if(is_array($routeInfo[1])){
        $response = call_user_func_array(array($routeInfo[1][0], $routeInfo[1][1]),$routeInfo[1][2]);
        echo $twig->render($response[0], ["parameters"=>$response[1]]);
    }
    else call_user_func_array($routeInfo[1], $routeInfo[2]); 
} elseif ($routeInfo[0] == FastRoute\Dispatcher::NOT_FOUND) {
    header('HTTP/1.0 404 Not Found');
    $security = new Security();
    $response = $security->index();
    echo $twig->render($response[0], ["parameters"=>$response[1]]); 
}*/
