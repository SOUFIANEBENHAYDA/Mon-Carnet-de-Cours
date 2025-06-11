<?php

function connexion_database(){
    $host = 'localhost';
    $dbname = 'academique';
    $user = 'root';
    $password = '';
    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connexion reussi";
        return $pdo;
    }catch(PDOException $e){
        die("Connexion error :" . $e->getMessage());
    }
}

class Documents{
    private $id_document;
    private $titre;
    private $fichier;
    private $id_matiere;

    function __construct($id_document,$titre,$fichier,$id_matiere)
    {
        $this->id_document = $id_document;
        $this->titre = $titre;
        $this->fichier = $fichier;
        $this->id_matiere = $id_matiere;

    }

    function getId_document(){
        return $this->id_document;
    }
    function getTitre(){
        return $this->titre;
    }
    function getFichier(){
        return $this->fichier;
    }
    function getId_matiere(){
        return $this->id_matiere;
    }


    function setId_document($id_document){
        $this->id_document=$id_document;
    }
    function setTitre($titre){
        $this->titre=$titre;
    }
    function setFichier($fichier){
        $this->fichier=$fichier;
    }
    function setId_matiere($id_matiere){
        $this->id_matiere=$id_matiere;
    }


    function display(){
        $pdo = connexion_database();
        $stmt = $pdo -> prepare("SELECT * FROM documents");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

        
    }
    function create(){
        $pdo = connexion_database();
    }
    function edit(){
        $pdo = connexion_database();
    }
    function destroy(){
        $pdo = connexion_database();
    }
}











?>