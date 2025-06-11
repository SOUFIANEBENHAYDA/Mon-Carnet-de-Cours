<?php
require_once __DIR__ . '/../modele/modele_etudiant.php';
require_once __DIR__ . '/../modele/modele_admin.php';



function loginAdmin_action(){
    if(!empty($_POST["password"]) && !empty($_POST["email"])){
        $res=loginAdmin();
        if($res!=false){
            if($res["password"]===$_POST["password"]){
                session_start();
                $admin= new Admin($res["ida"], $res["nom"], $res["prenom"],$res["email"],$res["password"]);
                $_SESSION["admin"]=$admin;
                header("Location: ../view/acceuil_admin.php");
                exit();
            }
        }else{
            //echo "email doesn't exit";
        }
    }
    //echo "veullez remplire tous les champs";
}

function loginEtudiant_action(){
    if(!empty($_POST["password"]) && !empty($_POST["email"])){
        $res=loginEtudiant();
        if($res!=false){
            if($res["mot_de_pass"]===$_POST["password"]){
                session_start();
                $etudiant= new Etudiant($res["ida"], $res["nom"], $res["prenom"], $res["filiers_id"], $res["email"],$res["mot_de_pass"], $res["photo"]);
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


function choix_connexion(){
    require_once __DIR__. '/../view/choix_connexion.php';
    
}

function connexion_admin(){
    $admin = loginAdmin_action();

    //require_once __DIR__. '/../view/connexion_etudiant.php';
}


function donne_verification(){
    $etudiant = loginEtudiant_action(); 
    //completement
    //require_once __DIR__. '/../view/tst.php';
}




?>
