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
class Cours{
    
    private $id_cours;
    private $jour;
    private $heure_debut;
    private $heure_fin;
    private $salle;
    private $id_matiere;
    
    function __construct($id_cours, $jour, $heure_debut, $heure_fin, $salle, $id_matiere){
        $this->id_cours = $id_cours;
        $this->jour = $jour;
        $this->heure_debut = $heure_debut;
        $this->heure_fin = $heure_fin;
        $this->salle = $salle;
        $this->id_matiere = $id_matiere;
    }
    
    function getId_cour(){
        return $this->id_cours;
    }
    function getJour(){
        return $this->jour;
    }
    function getHeureDebut(){
        return $this->heure_debut;
    }
    function getHeureFin(){
        return $this->heure_fin;
    }
    function getSalle(){
        return $this->salle;
    }
    function getId_matiere(){
        return $this->id_matiere;
    }

    function setId_cour($id_cours){
        $this->id_cours = $id_cours;
    }
    function setJour($jour){
        $this->jour=$jour;
    }
    function setHeureDebut($heure_debut){
        $this->heure_debut=$heure_debut;
    }
    function setHeureFin($heure_fin){
        $this->heure_fin=$heure_fin;
    }
    function setSalle($salle){
        $this->salle=$salle;
    }
    function setId_matiere($id_matiere){
        $this->id_matiere=$id_matiere;
    }

    function display(){
        $pdo = connexion_database();
        $stmt = $pdo -> prepare("SELECT * FROM cours");
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