<?php

class Database{

    public static function connect(){
        $db = new mysqli('localhost','root','','Automotriz_clientes');
        $db->query("SET NAMES 'utf-8'");

        return $db;
    }
}