<?php

require_once __DIR__."/../modele/connexion_db.php";

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

class Emploi{
    function display(){
        $pdo = connexion_database();
        $stmt = $pdo -> prepare("SELECT * FROM emploi");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    
        
    }

    static function create(){
        $pdo = connexion_database();
        $stat=$pdo->prepare("INSERT INTO 
        emploi(id_filiere, niveau,
        lun1, lun2, lun3, lun4,
        mar1, mar2, mar3, mar4,
        mer1, mer2, mer3, mer4,
        jeu1, jeu2, jeu3, jeu4,
        ven1, ven2, ven3, ven4,
        sam1, sam2, sam3, sam4) 
        VALUES(:idf, :niv,
        :lun1, :lun2, :lun3, :lun4, 
        :mar1, :mar2, :mar3, :mar4, 
        :mer1, :mer2, :mer3, :mer4,
        :jeu1, :jeu2, :jeu3, :jeu4,
        :ven1, :ven2, :ven3, :ven4,
        :sam1, :sam2, :sam3, :sam4) ");

        $stat->bindParam(":idf",$_POST["filiere"]);
        $stat->bindParam(":niv",$_POST["niveau"]);

        $stat->bindParam(":lun1",$_POST["lun1"]);
        $stat->bindParam(":lun2",$_POST["lun2"]);
        $stat->bindParam(":lun3",$_POST["lun3"]);
        $stat->bindParam(":lun4",$_POST["lun4"]);
        
        $stat->bindParam(":mar1",$_POST["mar1"]);
        $stat->bindParam(":mar2",$_POST["mar2"]);
        $stat->bindParam(":mar3",$_POST["mar3"]);
        $stat->bindParam(":mar4",$_POST["mar4"]);
        
        $stat->bindParam(":mer1",$_POST["mer1"]);
        $stat->bindParam(":mer2",$_POST["mer2"]);
        $stat->bindParam(":mer3",$_POST["mer3"]);
        $stat->bindParam(":mer4",$_POST["mer4"]);
        
        $stat->bindParam(":jeu1",$_POST["jeu1"]);
        $stat->bindParam(":jeu2",$_POST["jeu2"]);
        $stat->bindParam(":jeu3",$_POST["jeu3"]);
        $stat->bindParam(":jeu4",$_POST["jeu4"]);
        
        $stat->bindParam(":ven1",$_POST["ven1"]);
        $stat->bindParam(":ven2",$_POST["ven2"]);
        $stat->bindParam(":ven3",$_POST["ven3"]);
        $stat->bindParam(":ven4",$_POST["ven4"]);
        
        $stat->bindParam(":sam1",$_POST["sam1"]);
        $stat->bindParam(":sam2",$_POST["sam2"]);
        $stat->bindParam(":sam3",$_POST["sam3"]);
        $stat->bindParam(":sam4",$_POST["sam4"]);

        $stat->execute();
    }
    static function display_for_etudiant_by_filiere($f,$n){
        $pdo = connexion_database();
        $stmt = $pdo -> prepare("SELECT * FROM emploi where id_filiere=:idf AND niveau=:niv AND id_emploi=(select MAX(id_emploi) from emploi where id_filiere=:idf)");
        $stmt->bindParam(":idf", $f);
        $stmt->bindParam(":niv", $n);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function edit(){
        $pdo = connexion_database();
    }
    function destroy(){
        $pdo = connexion_database();
    }
    
}
?>