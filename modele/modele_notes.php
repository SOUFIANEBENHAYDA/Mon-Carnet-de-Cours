<?php

require_once __DIR__."/../modele/connexion_db.php";

class Note{
    private $id_note;
    private $type_note; 
    private $valeur;
    private $id_etudiant;
    private $id_matiere;

    function __construct($id_note,$type_note,$valeur,$id_etudiant,$id_matiere)
    {
        $this->id_note=$id_note;
        $this->type_note=$type_note;
        $this->valeur=$valeur;
        $this->id_etudiant=$id_etudiant;
        $this->id_matiere=$id_matiere;
    }

    function getId_note(){
        return $this->id_note;
    }
    function getType_note(){
        return $this->type_note;
    }
    function getValeur(){
        return $this->valeur;
    }
    function getId_etudiant(){
        return $this->id_etudiant;
    }
    function getId_matiere(){
        return $this->id_matiere;
    }

    
    function setId_note($id_note){
        $this->id_note=$id_note;
    }
    function setType_note($type_note){
        $this->type_note=$type_note;
    }
    function setValeur($valeur){
        $this->valeur=$valeur;
    }
    function setId_etudiant($id_etudiant){
        $this->id_etudiant=$id_etudiant;
    }
    function setId_matiere($id_matiere){
        $this->id_matiere=$id_matiere;
    }



    static function display(){
        $pdo = connexion_database();
        $stmt = $pdo -> prepare("SELECT * FROM notes");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }

    static function create_note(){
        $pdo = connexion_database();
        if(isset($_POST['nom'])&&isset($_POST['matiere'])&&isset($_POST['type'])&&isset($_POST['note'])){
            $stmt = $pdo->prepare("INSERT INTO notes(type_note,valeur,id_etudiant,id_matiere) VALUES(:typen,:valeur,:ide,:idm)");
            $stmt->bindParam(':typen',$_POST['type']);
            $stmt->bindParam(':valeur',$_POST['note']);
            $ide = id_etudiant_parNom_action($_POST['nom']);
            $stmt->bindParam(':ide',$ide);
            $stmt->bindParam(':idm',$_POST['matiere']);
            $stmt->execute();
            header("Location: ../view/note_ad.php");
            exit();
        }
    }
    static function edite_note_by_id($id){
        $pdo = connexion_database();
        if(isset($_POST['nom'])&&isset($_POST['matiere'])&&isset($_POST['type'])&&isset($_POST['note'])){
            $stmt = $pdo->prepare("UPDATE notes SET type_note = :typen, valeur = :valeur, id_etudiant = :ide, id_matiere = :idm WHERE id_note = :id;");
            $stmt->bindParam(':typen',$_POST['type']);
            $stmt->bindParam(':valeur',$_POST['note']);
            $ide = id_etudiant_parNom_action($_POST['nom']);
            $stmt->bindParam(':ide',$ide);
            $stmt->bindParam(':idm',$_POST['matiere']);
            $stmt->bindParam(':id',$$_POST['id']);
            $stmt->execute();
            header("Location: ../view/note_ad.php");
            exit();
        }
    }
    //affiche tous les notes dans la base de donnee
    static function note_etud_display(){
        $pdo=connexion_database();
        $stat=$pdo->prepare('SELECT n.id_note as "idn", e.id_etudiant as "ide", e.nom as "nom_etud", m.nom as "matiere",n.type_note as "type_note", n.valeur as "note" FROM etudiants e INNER JOIN notes n ON e.id_etudiant=n.id_etudiant INNER JOIN matieres m ON n.id_matiere=m.id_matiere ORDER BY e.nom,m.nom , n.type_note');
        $stat->execute();
        $notes=$stat->fetchAll();
        return $notes;
        }


    function edit(){
        $pdo = connexion_database();
    }
    static function destroy($id){
        $pdo = connexion_database();
        $stat=$pdo->prepare("DELETE FROM notes WHERE id_note=:id");
        $stat->bindParam(":id", $id);
        $stat->execute();
    }
}
?>