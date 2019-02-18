<?php

class Mjesto
{
    
    public static function read(){
        $db = Db::getInstance();
        $izraz = $db->prepare("select brojReda, brojSjedala from mjesto");
        $izraz->execute();
        return $izraz->fetchAll();
    }

}