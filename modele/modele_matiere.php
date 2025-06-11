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

class Matiere{
    private $id_matiere;
    private $nom;
    private $coefficient;
    private $id_prof;

    function __construct($id_matiere,$nom,$coefficient,$id_prof)
    {
        $this->id_matiere=$id_matiere;
        $this->nom=$nom;
        $this->coefficient=$coefficient;
        $this->id_prof=$id_prof;
    }

    function getId_matiere(){
        return $this->id_matiere;
    }
    function getNom(){
        return $this->nom;
    }
    function getCoefficient(){
        return $this->coefficient;
    }
    function getId_prof(){
        return $this->id_prof;
    }


    function setId_matiere($id_matiere){
        $this->id_matiere=$id_matiere;
    }
    function setNom($nom){
        $this->nom=$nom;
    }
    function setCoefficient($coefficient){
        $this->coefficient=$coefficient;
    }
    function setId_prof($id_prof){
        $this->id_prof=$id_prof;
    }


    function display(){
        $pdo = connexion_database();
        $stmt = $pdo -> prepare("SELECT * FROM matieres");
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