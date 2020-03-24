<?php

namespace App\Controller;

class Home{
    public function index(){
        return ["home.index.twig",["nav"=>"home"]];
    }

    public function myForm($post=[]){
        if(count($post) == 0)$name = "";
        else $name = $post["name"];
        return ["home.myform.twig",["nav"=>"myform","name"=>$name]];
    }
}
