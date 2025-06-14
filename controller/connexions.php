<?php
require_once __DIR__ . '/../modele/modele_etudiant.php';
require_once __DIR__ . '/../modele/modele_admin.php';
require_once __DIR__ . '/../modele/modele_filiere.php';



function choix_connexion(){
    require_once __DIR__. '/../view/choix_connexion.php';
    
}

function connexion_admin(){
    loginAdmin_action();

    
}


function donne_verification(){
    loginEtudiant_action();
    
}


//*********** */
function add_etudiant(){
    $res=display_filiers();
    require_once __DIR__."/../view/ajouter_etudiant_vew.php";
    
}

function display_filiers(){
    
    return Filiere::display();
}

function create_etudiant(){
    inscrire();
    header('location: ../view/acceuil_admin.php');
}

function note_admin(){
    require_once __DIR__.'/../view/note_admin.php';
}

?>
