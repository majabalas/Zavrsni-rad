<?php

class Korisnik{

    public static function read(){
        $db = Db::getInstance();
        $izraz = $db->prepare("select korisnickoIme, lozinka from korisnik");
        $izraz->execute();
        return $izraz->fetchAll();
    }

}