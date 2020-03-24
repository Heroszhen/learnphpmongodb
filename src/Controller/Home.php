<?php

namespace App\Controller;

class Home{
    public function index(){
        return ["home.index.twig",["nav"=>"home"]];
    }
}
