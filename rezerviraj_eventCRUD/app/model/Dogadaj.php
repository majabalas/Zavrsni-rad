<?php
class Dogadaj
{
    public static function read()
    {
        $db=Db::getInstance();
        $izraz=$db->prepare("select * from dogadaj order by naziv");
        $izraz->execute();
        return $izraz->fetchAll();
    }

    public static function find($id){
        $db = Db::getInstance();
        $izraz = $db->prepare("select * from dogadaj where sifra=:sifra");
        $izraz->execute(["sifra"=>$id]);
        return $izraz->fetch();
    }

    public static function add()
    {
        $db = Db::getInstance();
        $izraz = $db->prepare("insert into dogadaj (naziv) 
        values (:naziv)");
        $izraz->execute(self::podaci());
    }

    public static function update($id)
    {
        $db = Db::getInstance();
        $izraz = $db->prepare("update dogadaj set 
        naziv=:naziv
        where sifra=:sifra");
        $podaci = self::podaci();
        $podaci["sifra"]=$id;
        $izraz->execute($podaci);
    }

    public static function delete($id)
    {
        $db = Db::getInstance();
        $izraz = $db->prepare("delete from dogadaj where sifra=:sifra");
        $podaci = [];
        $podaci["sifra"]=$id;
        $izraz->execute($podaci);
    }

    private static function podaci(){
        return [
            "naziv"=>Request::post("naziv")
        ];
 
    }
}