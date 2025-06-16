<?php

require_once __DIR__."/../modele/connexion_db.php";

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
    function getFilier(){
        $res=display_filiers();
        foreach($res as $r){
            if($r["id_filiere"]==$this->id_filiere){
                return $r["nom"];
                break;
            }
        }
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



    static function display(){
        $pdo = connexion_database();
        $stmt = $pdo -> prepare("SELECT * FROM etudiants");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

        
    }
    function create(){
        $pdo = connexion_database();
    }
    static function edit(){
        $pdo = connexion_database();
        if (!empty($_POST["nom"]) && !empty($_POST["tele"]) && !empty($_POST["email"]) && !empty($_POST["genre"]) &&
    !empty($_POST["date_nais"]) && !empty($_POST["niveau"]) && !empty($_FILES["photo"]) &&
    !empty($_POST["filiere"]) && !empty($_POST["password"]) && !empty($_POST["id"])) {
    
    $dossier = "../photos/";
    $nomImage = $_FILES['photo']['name'];
    $cheminImage = $dossier . $nomImage;

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $cheminImage)) {

        $stat = $pdo->prepare("UPDATE etudiants SET nom = :nom, telephone = :tel, email = :email, genre = :genre, date_nissance = :dn, photo = :photo, id_filiere = :idf, mot_de_pass = :pwd, niveau = :niveau WHERE id_etudiant = :id");

        $stat->bindParam(":nom", $_POST["nom"]);
        $stat->bindParam(":tel", $_POST["tele"]);
        $stat->bindParam(":email", $_POST["email"]);
        $stat->bindParam(":genre", $_POST["genre"]);
        $stat->bindParam(":dn", $_POST["date_nais"]);
        $stat->bindParam(":niveau", $_POST["niveau"]);
        $stat->bindParam(":photo", $cheminImage);
        $stat->bindParam(":idf", $_POST["filiere"]);
        $stat->bindParam(":pwd", $_POST["password"]);
        $stat->bindParam(":id", $_POST["id"]);

        $stat->execute();
    }
}

    }
    static function destroy(){
        $pdo = connexion_database();
        $stat=$pdo->prepare("DELETE FROM etudiants WHERE id_etudiant = :id");
        $stat->bindParam(":id", $_GET["id"]);
        $stat->execute();
    }

    
}

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
            if ($_POST["password"]==$res["mot_de_pass"]){
                session_start();
                $etudiant= new Etudiant($res["id_etudiant"], $res["telephone"], $res["nom"], $res["email"], $res["photo"],$res["id_filiere"], $res["mot_de_pass"]);
                $_SESSION["etudiant"]=$etudiant;
                header("Location: ../view/acceuil_etudiants.php");
                exit();
            }else{
                //echo "<script>alert('mot de pass incorrect')</script>";
                header("Location: ../view/trait_connexion.php");
                exit();
            }
        }else{
            //echo "<script>alert('email n'existe pas')</script>";
            header("Location: ../view/connexion_etudiant.php");
            exit();
        }
    }else{
        //echo "<script>alert('veullez remplire tous les champs')</script>";
        header("Location: ../view/connexion_etudiant.php");
        exit();
    }
}
//les alerts makhdaminch ila drtihom 9bl l header()




function verifier_donne(){
    $pdo = connexion_database();
    echo "heloo";
}

function inscrire(){
    $pdo=connexion_database();

    if(!empty($_POST["nom"])&&!empty($_POST["tele"])&&!empty($_POST["email"])&&!empty($_POST["genre"])&&!empty($_POST["date_nais"])&&!empty($_POST["niveau"])&&!empty($_FILES["photo"])&&!empty($_POST["filiere"])&&!empty($_POST["password"])){   
        
        $dossier = "../photos/";
        $nomImage = $_FILES['photo']['name'];
        $cheminImage = $dossier . $nomImage;

        if(move_uploaded_file($_FILES['photo']['tmp_name'], $cheminImage)){

            $stat=$pdo->prepare("INSERT INTO etudiants(nom, telephone, email, genre, date_nissance, photo, id_filiere, mot_de_pass, niveau) VALUES(:nom, :tel, :email, :genre, :dn, :photo, :idf, :pwd, :niveau)");
            $stat->bindParam(":nom", $_POST["nom"]);
            $stat->bindParam(":tel", $_POST["tele"]);
            $stat->bindParam(":email", $_POST["email"]);
            $stat->bindParam(":genre", $_POST["genre"]);
            $stat->bindParam(":dn", $_POST["date_nais"]);
            $stat->bindParam(":niveau", $_POST["niveau"]);
            $stat->bindParam(":photo", $cheminImage);
            $stat->bindParam(":idf", $_POST["filiere"]);
            $stat->bindParam(":pwd", $_POST["password"]);
            $stat->execute();
            
            //header("Location: ../view/list_etudiant.php");
        }
        else{
            echo "error";
        }
    }
    
};

//pour affichage de groupes chez l'Admin
function display_pare_filier($f){
    $pdo=connexion_database();
    $stat=$pdo->prepare("SELECT * FROM etudiants where id_filiere=:idf");
    $stat->bindParam(":idf", $f);
    $stat->execute();
    $result=$stat->fetchAll();
    return $result;
}

function etudiant_id_par_nom($nom){
    $pdo=connexion_database();
    $stat=$pdo->prepare("SELECT * FROM etudiants where nom=:nom");
    $stat->bindParam(":nom", $nom);
    $stat->execute();
    $result=$stat->fetch();
    return $result['id_etudiant'];
}

?>