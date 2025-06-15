<?php
require_once __DIR__ . '/../modele/modele_filiere.php';
require_once __DIR__ . '/../modele/modele_etudiant.php';
require_once __DIR__ . '/../modele/modele_admin.php';
require_once __DIR__ . '/../modele/modele_notes.php';
require_once __DIR__ . '/../modele/modele_matiere.php';
require_once __DIR__ . '/../modele/modele_prof.php';



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

function display_prof(){
    $result=Professeur::display();
    require_once __DIR__."/../view/ajouter_matiere.php";

}

function add_matiere(){
    Matiere::ajouter();
    require_once __DIR__. '/../view/acceuil_admin.php';
}

function create_etudiant(){
    inscrire();
    header('location: ../view/acceuil_admin.php');
}

function note_admin(){
    $res = Matiere::display();
    require_once __DIR__.'/../view/note_admin.php';
    
}
function id_etudiant_parNom_action($nom){
    $id_nom = etudiant_id_par_nom($nom);
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
            <tr><td>{$e['nom']}</td><td>{$e['email']}</td><td>{$e['telephone']}</td></tr>
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
/*
function ajouter_matiere(){
    require_once "../view/ajouter_matiere.php";

    if(!empty($_POST["nom"])&&!empty($_POST["ceof"])&&!empty($_POST["idp"])){
        $matiere=new Matiere($_POST["nom"],$_POST["ceof"],$_POST["idp"]);
        $matiere->ajouter();

        header("Location: ../view/acceuil_admin.php");
    }
}
    */
?>
