<?php
require_once __DIR__ . '/../modele/modele_etudiant.php';
require_once __DIR__ . '/../modele/modele_admin.php';



function choix_connexion(){
    require_once __DIR__. '/../view/choix_connexion.php';
    
}

function connexion_admin(){
    loginAdmin_action();

    
}


function donne_verification(){
    loginEtudiant_action();
    
}

function add_etudiant(){
    require_once __DIR__."/../view/ajouter_etudiant_vew.php";
    inscrire();
}



?>
