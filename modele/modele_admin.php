<?php
require_once __DIR__."/../modele/connexion_db.php";

function loginAdmin(){
    $pdo=connexion_database();
    $email=$_POST["email"];
    $stat=$pdo->prepare("SELECT * FROM administration WHERE email=:email");
    $stat->bindParam(":email",$email);
    $stat->execute();
    return $stat->fetch();
}
function loginAdmin_action(){
    if(!empty($_POST["email"]) && !empty($_POST["password"])){
        $res=loginAdmin();
        echo "<script>alert('welcome')</script>";
        if($res!=false){
            echo "<script>alert('befor into check password')</script>";
            if($res["password"]==$_POST["password"]){
                echo "<script>alert('matched')</script>";
                session_start();
                $admin= new Admin($res["ida"], $res["nom"], $res["prenom"],$res["email"],$res["password"]);
                $_SESSION["admin"]=$admin;
                $_SESSION["user"]="admin";
                header("Location: ../view/acceuil_admin.php");
                exit();
                
            }else{
                echo "<script>alert('password wrong')</script>";
                header("Location: ../view/connexion_admin1.php");
                exit();
            }
        }else{
            echo "<script>alert('didn't match email')</script>";
            header("Location: ../view/connexion_admin1.php");
            exit();
            //+echo "email doesn't exit";
        }
    }
    //echo "veullez remplire tous les champs";
    header("Location: ../view/connexion_admin1.php");
    exit();
}



class Admin{
    private $email, $pwd;
    private $nom, $prenom, $ida;

    public function __construct($email, $nom, $prenom, $ida, $pwd)
    {
        $this->ida=$ida;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->pwd=$pwd;
    }


    function getEmail(){
        return $this->email;
    }
    function getNom(){
        return $this->nom;
    }
    function getPrenom(){
        return $this->prenom;
    }
    function getIdA(){
        return $this->ida;
    }
    function getPassword(){
        return $this->pwd;
    }


    function setEmail($email){
        $this->email=$email;
    }
    function setNom($nom){
        $this->nom=$nom;
    }
    function setPrenom($prenom){
        $this->prenom=$prenom;
    }
    function setIdA($ida){
        $this->ida=$ida;
    }
    function setPassword($pwd){
        $this->pwd=$pwd;
    }
    

    
    //ajouter des nouveau etudiant
    public function insciription(){
        inscrire();
    }
    //ajouter des matieres
    public function AjouterMatiere(){
        //ajouter_matiere();
    }
    //ajouter les cours(emploi de temps)
    public function ajoutercours(){
        
    }
    //les notes
    public function AjouterNotes(){

    }
}

?>