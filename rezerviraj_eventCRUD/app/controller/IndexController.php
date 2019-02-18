<?php

class IndexController{
    function index(){
       

        $view = new View();
        $view->render('index',["poruka"=>"Dobrodošli!"]);

    }
}