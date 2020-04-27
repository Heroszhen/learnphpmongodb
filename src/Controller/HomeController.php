<?php

namespace App\Controller;

use Frameworkphp3wa\AbstractController;
use Frameworkphp3wa\FlashBag;
use App\Repository\HomeRepository;

class HomeController extends AbstractController{

    public function index(){
        $flash = new FlashBag();
        $flash->empty();
        $flash->set("exemple flashbag message","info");
        return $this->render("home.index.twig",[
            "flash" => $flash->get()
        ]);
    }
    
    public function Learning(){
		$hr = new HomeRepository();
		$comments = $hr->Learning();/*
		echo "<pre>";
		var_dump($comments);
		echo "</pre>";*/
		return $this->render("home.learning.twig",[
            "comments" => $comments
        ]);
	}
}
