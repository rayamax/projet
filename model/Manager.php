<?php

include $_SERVER["DOCUMENT_ROOT"]."/projet4/config.php"; 

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8', NAME,PASSWORD);
        return $db;
    }
}
//'mysql:host=localhost;dbname=projet;charset=utf8', 'root',''