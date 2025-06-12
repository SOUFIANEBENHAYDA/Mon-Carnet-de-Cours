<?php
require_once __DIR__ . '/../modele/modele_etudiant.php';
require_once __DIR__ . '/../modele/modele_admin.php';



function choix_connexion(){
    require_once __DIR__. '/../view/choix_connexion.php';
    
}

function connexion_admin(){
    loginAdmin_action();
    header("Location: ../view/acceuil_admin.php");
    exit();

    
}


function donne_verification(){
    $x = loginEtudiant_action();
    header("Location: ../view/acceuil_etudiants.php");
    exit(); 
    
}

function add_etudiant(){
    require_once __DIR__."/../view/ajouter_etudiant_vew.php";
    inscrire();
}



?>
