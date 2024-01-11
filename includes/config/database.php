<?php
function conectarDB(): mysqli{
    $db = new mysqli('localhost', 'root', '00356','farmacia');
    mysqli_set_charset($db, "utf8");
    if(!$db){
        echo "no se conecto";        
        exit;
    }
    return $db;
}
