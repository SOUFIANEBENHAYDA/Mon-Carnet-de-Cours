<?php


require_once __DIR__."/../modele/connexion_db.php";

class Professeur{
    private $id_prof;
    private $nom;
    private $email;
    private $departement;
    
    function __construct($id_prof,$nom,$email,$departement)
    {
        $this->id_prof=$id_prof;
        $this->nom=$nom;
        $this->email=$email;
        $this->departement=$departement;
        
    }

    function getId_prof(){
        return $this->id_prof;
    }
    function getNom(){
        return $this->nom;
    }
    function getEmail(){
        return $this->email;
    }
    function getDepartement(){
        return $this->departement;
    }
    


    function setId_prof($id_prof){
        $this->id_prof=$id_prof;
    }
    function setNom($nom){
        $this->nom=$nom;
    }
    function setEmail($email){
        $this->email=$email;
    }
    function setDepartement($departement){
        $this->departement=$departement;
    }
    


    
    function display(){
        $pdo = connexion_database();
        $stmt = $pdo -> prepare("SELECT * FROM professeurs");
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