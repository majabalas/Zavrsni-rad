<?php

class DogadajController{
   
   public function __construct()
   {
    if(!Session::getInstance()->isLogiran()){
        $view = new View();
        $view->render('index',["poruka"=>"Nemate ovlasti"]);
        exit;
    }
   }
   

   function add()
    {
        $kontrola = $this->kontrola();
        if($kontrola===true){
            Dogadaj::add();
            $this->index();
        }else{
            $view = new View();
            $view->render(
                'dogadaji/new',
                [
                "poruka"=>$kontrola
                ]
            );
        }
    }


   function edit($id)
    {
        $_POST["sifra"]=$id;
        $kontrola = $this->kontrola();
        if($kontrola===true){
            Dogadaj::update($id);
            $this->index();
        }else{
            $view = new View();
            $view->render(
                'dogadaji/edit',
                [
                "poruka"=>$kontrola
                ]
            );
        }
    }


    function delete($id)
    {
            Dogadaj::delete($id);
            $this->index();
    }


    function kontrola()
    {
        if(Request::post("naziv")===""){
            return "Naziv obavezan";
        }

        if(strlen(Request::post("naziv"))>50){
            return "Naziv ne smije biti veći od 50 znakova";
        }

        $db = Db::getInstance();
        $izraz = $db->prepare("select count(sifra) from dogadaj where naziv=:naziv and sifra<>:sifra");
        $izraz->execute(["naziv"=>Request::post("naziv"), "sifra" => Request::post("sifra")]);
        $ukupno = $izraz->fetchColumn();
        if($ukupno>0){
            return "Naziv postoji, odaberite drugi";
        }
        return true;
    }


    function prepareadd()
    {
        $view = new View();
        $view->render(
            'dogadaji/new',
            [
            "poruka"=>""
            ]
        );
    }

    function prepareedit($id)
    {
        $view = new View();
        $dogadaj = Dogadaj::find($id);
        $_POST["naziv"]=$dogadaj->naziv;
        $_POST["sifra"]=$dogadaj->sifra;
 
        $view->render(
            'dogadaji/edit',
            [
            "poruka"=>""
            ]
        );
    }

    function index(){
        //echo "Hello";

        $view = new View();
        $view->render('dogadaji/index',["dogadaji"=>Dogadaj::read()]);
    }
}