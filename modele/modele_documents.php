<?php


require_once __DIR__."/../modele/connexion_db.php";


class Documents{
    private $id_document;
    private $titre;
    private $fichier;
    private $id_matiere;

    function __construct($titre,$fichier,$id_matiere,$id_document="")
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


    static function display(){
        $pdo = connexion_database();
        $stmt = $pdo -> prepare("SELECT * FROM documents");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

        
    }
    function ajouter(){
        $pdo = connexion_database();
        $stat=$pdo->prepare("INSERT INTO documents(titre, fichier, id_matiere) values(:titre, :fichier, :idm)");
        $stat->bindParam(":titre", $this->titre);
        $stat->bindParam(":fichier", $this->fichier);
        $stat->bindParam(":idm", $this->id_matiere);
        $stat->execute();
    }
    function edit(){
        $pdo = connexion_database();
    }
    function destroy(){
        $pdo = connexion_database();
    }
}











?>