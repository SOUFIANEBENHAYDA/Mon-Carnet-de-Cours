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

function loginEtudiant(){
    $pdo=connexion_database();
    $email=$_POST["email"];
    $stat=$pdo->prepare("SELECT * FROM etudiants where email=:email");
    $stat->bindParam(":email",$email);
    $stat->execute();
    return $stat->fetch();
}

function loginEtudiant_action(){
    if(!empty($_POST["password"]) && !empty($_POST["email"])){
        $res=loginEtudiant();
        if($res!=false){
            if($res["mot_de_pass"]===$_POST["password"]){
                session_start();
                $etudiant= new Etudiant($res["ida"], $res["nom"], $res["prenom"], $res["filiers_id"], $res["email"],$res["mot_de_pass"], $res["photo"]);
                $_SESSION["etudiant"]=$etudiant;
                header("Location: ../view/tst.php");
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


?>