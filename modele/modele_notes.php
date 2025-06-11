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



    function display(){
        $pdo = connexion_database();
        $stmt = $pdo -> prepare("SELECT * FROM notes");
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