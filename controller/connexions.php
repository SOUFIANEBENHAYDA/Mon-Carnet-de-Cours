<?php
require_once __DIR__ . '/../modele/modele_etudiant.php';



function choix_connexion(){
    require_once __DIR__. '/../view/choix_connexion.php';
    
}

function connexion_etudiant(){
    require_once __DIR__. '/../view/connexion_etudiant.php';
}


function donne_verification(){
    $x = loginEtudiant_action(); 
    //completement
    //require_once __DIR__. '/../view/tst.php';
}




?>
