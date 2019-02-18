<?php

class MjestoController{

    public function __construct(){
        if(!Session::getInstance()->isLogiran()){
            $view = new View();
            $view->render('index',["poruka"=>"Nemate ovlasti"]);
            exit;
        }
    }

   


    function index(){
        $view = new View();
        $view->render(
            'mjesta/index',
            [
            "mjesta"=>Mjesto::read()
            ]
        );
    }
}