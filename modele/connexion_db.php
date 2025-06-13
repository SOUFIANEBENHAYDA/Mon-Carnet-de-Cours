<?php

function connexion_database(){
    $host = 'localhost';
    $dbname = 'academique';
    $user = 'root';
    $password = '';
    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }catch(PDOException $e){
        die("Connexion error :" . $e->getMessage());
    }
}

?>