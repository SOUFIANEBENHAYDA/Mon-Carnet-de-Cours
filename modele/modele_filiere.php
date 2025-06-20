<?php

require_once __DIR__."/../modele/connexion_db.php";

class Filiere{

    private $id_filiere;
    private $nom;
    private $niveau;
    private $responsable;
    
    function __construct($id_filiere,$nom,$niveau,$responsable)
    {
        $this->id_filiere = $id_filiere;
        $this->nom = $nom;
        $this->niveau = $niveau;
        $this->responsable = $responsable;

    }

    function getId_filiere(){
        return $this->id_filiere;
    }
    function getNom(){
        return $this->nom;
    }
    function getNiveau(){
        return $this->niveau;
    }
    function getResponsable(){
        return $this->responsable;
    }


    function setId_filiere($id_filiere){
        $this->id_filiere=$id_filiere;
    }
    function setNom($nom){
        $this->nom=$nom;
    }
    function setNiveau($niveau){
        $this->niveau=$niveau;
    }
    function setResponsable($responsable){
        $this->responsable=$responsable;
    }


    static function display(){
        $pdo = connexion_database();
        $stmt = $pdo -> prepare("SELECT * FROM filieres");
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