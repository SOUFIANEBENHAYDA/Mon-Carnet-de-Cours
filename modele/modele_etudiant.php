<?php

require_once __DIR__."/../modele/connexion_db.php";

function loginEtudiant(){
    $pdo=connexion_database();
    $email=$_POST["email"];
    $stat=$pdo->prepare("SELECT * FROM etudiants where email=:email");
    $stat->bindParam(":email",$email);
    $stat->execute();
    return $stat->fetch();
}

function loginEtudiant_action(){
    if(!empty($_POST["email"]) && !empty($_POST["password"])){
        $res=loginEtudiant();
        if($res!=false){
            if($res["mot_de_pass"]===$_POST["password"]){
                session_start();
                $etudiant= new Etudiant($res["id_etudiant"], $res["telephone"], $res["nom"], $res["email"], $res["photo"],$res["id_filiere"], $res["mot_de_pass"]);
                $_SESSION["etudiant"]=$etudiant;
                header("Location: ../view/acceuil_etudiants.php");
                exit();
            }
        }else{
            echo "email doesn't exit";
        }
    }
    echo "veullez remplire tous les champs";
}

class Etudiant{
    private $id_etudiant;
    private $num_etudiant;
    private $nom;
    private $email;
    private $photo;
    private $id_filiere;

    function __construct($id_etudiant,$num_etudiant,$nom,$email,$photo,$id_filiere)
    {
        $this->id_etudiant = $id_etudiant;
        $this->num_etudiant = $num_etudiant;
        $this->nom = $nom;
        $this->email = $email;
        $this->photo = $photo;
        $this->id_filiere = $id_filiere;

    }

    function getId_etudiant(){
        return $this->id_etudiant;
    }
    function getNum_etudiant(){
        return $this->num_etudiant;
    }
    function getNom(){
        return $this->nom;
    }
    function getEmail(){
        return $this->email;
    }
    function getPhoto(){
        return $this->photo;
    }
    function getId_filiere(){
        return $this->id_filiere;
    }


    function setId_etudiant($id_etudiant){
        $this->id_etudiant=$id_etudiant;
    }
    function setNum_etudiant($num_etudiant){
        $this->num_etudiant=$num_etudiant;
    }
    function setNom($nom){
        $this->nom=$nom;
    }
    function setEmail($email){
        $this->email=$email;
    }
    function setPhoto($photo){
        $this->photo=$photo;
    }
    function setId_filiere($id_filiere){
        $this->id_filiere=$id_filiere;
    }



    function display(){
        $pdo = connexion_database();
        $stmt = $pdo -> prepare("SELECT * FROM *etudiants");
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


function verifier_donne(){
    $pdo = connexion_database();
    echo "heloo";
}

function inscrire(){
    $pdo=connexion_database();

    if(!empty($_POST["nom"])&&!empty($_POST["tel"])&&!empty($_POST["email"])&&!empty($_POST["genre"])&&!empty($_POST["dn"])&&!empty($_POST["niveau"])&&!empty($_FILES["photo"])&&!empty($_POST["filiere"])&&!empty($_POST["pwd"])){   
        $img=$_FILES["photo"];

        $stat=$pdo->prepare("INSERT INTO etudiants(nom, telephone, email, genre, date_nissance, photo, id_filiere, mot_de_pass, niveau) VALUES(:nom, :tel, :email, :genre, :dn, :photo, :idf, :pwd, :niveau)");
        $stat->bindParam(":nom", $_POST["nom"]);
        $stat->bindParam(":tel", $_POST["tel"]);
        $stat->bindParam(":email", $_POST["email"]);
        $stat->bindParam(":genre", $_POST["genre"]);
        $stat->bindParam(":dn", $_POST["dn"]);
        $stat->bindParam(":niveau", $_POST["niveau"]);
        $stat->bindParam(":photo", $path);
        $stat->bindParam(":idf", $_POST["filiere"]);
        $stat->bindParam(":pwd", $_POST["pwd"]);
        
        $stat->execute();
        
        //header("Location:")
    }
    
};

?>