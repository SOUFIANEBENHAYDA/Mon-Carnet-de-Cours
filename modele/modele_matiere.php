<?php


require_once __DIR__."/../modele/connexion_db.php";

class Matiere{
    private $id_matiere;
    private $nom;
    private $coefficient;
    private $id_prof;

    function __construct($nom,$coefficient,$id_prof,$id_matiere="")
    {
        $this->nom=$nom;
        $this->coefficient=$coefficient;
        $this->id_prof=$id_prof;
        $this->id_matiere=$id_matiere; //maghadich n7tajo ID ta3 lmatiere f contructeur
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

    function ajouter(){
        $pdo=connexion_database();
        $stat=$pdo->prepare("INSERT INTO matieres(nom, coefficient, id_prof) VALUES(:nom, :c, :idp)");
        $stat->bindParam(":nom", $this->nom);
        $stat->bindParam(":c", $this->coefficient);
        $stat->bindParam(":idp", $this->id_prof);
        $stat->execute();
    }
}




?>