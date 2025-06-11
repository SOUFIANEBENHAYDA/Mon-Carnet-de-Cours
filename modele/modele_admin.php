<?php
function connexion(){
    try{
        $pdo=new PDO("mysql:host=localhost;dbname=institute", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }catch(PDOException $er){
        die("error de connexion: ".$er->getMessage());
    }
}

function loginAdmin(){
    $pdo=connexion();
    $email=$_POST["email"];
    $stat=$pdo->prepare("SELECT * FROM Administration where email=:email");
    $stat->bindParam(":email",$email);
    $stat->execute();
    return $stat->fetch();
}
function loginAdmin_action(){
    if(!empty($_POST["password"]) && !empty($_POST["email"])){
        $res=loginAdmin();
        if($res!=false){
            if($res["password"]===$_POST["password"]){
                session_start();
                $admin= new Admin($res["ida"], $res["nom"], $res["prenom"],$res["email"],$res["password"]);
                $_SESSION["admin"]=$admin;
                header("Location: interfaceAdmin.php");
                exit();
            }
        }else{
            //echo "email doesn't exit";
        }
    }
    //echo "veullez remplire tous les champs";
}
function inscrire(){};
function ajouter_matiere(){};

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
        ajouter_matiere();
    }
    //ajouter les cours(emploi de temps)
    public function ajoutercours(){
        
    }
    //les notes
    public function AjouterNotes(){

    }
}

?>