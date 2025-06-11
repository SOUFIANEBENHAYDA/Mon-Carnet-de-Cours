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

class EspaceEtudiant{
    private $id_post;
    private $contenu;
    private $date_post;
    private $id_etudiant;
    private $id_matiere;

    function __construct($id_post,$contenu,$date_post,$id_etudiant,$id_matiere)
    {
        $this->id_post=$id_post;
        $this->contenu=$contenu;
        $this->date_post=$date_post;
        $this->id_etudiant=$id_etudiant;
        $this->id_matiere=$id_matiere;
    }

    function getId_post(){
        return $this->id_post;
    }
    function getContenu(){
        return $this->contenu;
    }
    function getDate_post(){
        return $this->date_post;
    }
    function getId_etudiant(){
        return $this->id_etudiant;
    }
    function getId_matiere(){
        return $this->id_matiere;
    }


    function setId_post($id_post){
        $this->id_post=$id_post;
    }
    function setContenu($contenu){
        $this->contenu=$contenu;
    }
    function setDate_post($date_post){
        $this->date_post=$date_post;
    }
    function setId_etudiant($id_etudiant){
        $this->id_etudiant=$id_etudiant;
    }
    function setId_matiere($id_matiere){
        $this->id_matiere=$id_matiere;
    }


    function display(){
        $pdo = connexion_database();
        $stmt = $pdo -> prepare("SELECT * FROM posts_forum");
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