<?php

namespace App\Controller;

class Home extends AbstractController{
    public function index(){
        $this->render("home.index.twig",["nav"=>"home"]);
    }

    public function myForm($post=[]){
        if(count($post) == 0)$name = "";
        else $name = $post["name"];
        return ["home.myform.twig",["nav"=>"myform","name"=>$name]];
    }

    public function Introduction(){
        $this->render("home.introduction.twig",["nav"=>"introduction"]);
    }
}
