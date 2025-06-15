<?php
require_once __DIR__ . '/../modele/modele_filiere.php';
require_once __DIR__ . '/../modele/modele_etudiant.php';
require_once __DIR__ . '/../modele/modele_admin.php';
require_once __DIR__ . '/../modele/modele_notes.php';



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
    /////////////////
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

function add_note(){
    require_once __DIR__.'/../view/ajouter_note.php';
}

function verify_note(){
    Note::create_note();
}

//mal9itch kifach ndir liha b view hada lah
function display_etudiants_par_filiere(){
    $res=display_filiers();
    foreach($res as $r){
        echo "
        <h3>list de filiere {$r['nom']}<h3>
        <table>
        <tr><th>Nom et prenom</th><th>email</th><th>telephone</th></tr>
        ";
        $etudes=display_pare_filier($r["id_filiere"]);
        foreach($etudes as $e){
            echo "
            <tr><td>{$e['nom']}</td><td>{$e['email']}</td>{$e['tel']}</tr>
            ";
            //ila ba9i biti tzid lakhrin 3la 9bl l crud dyalhom
            
        }
        echo "
        </table>
        ";
    }
    ?>
    <?php

}
?>
