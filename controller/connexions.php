<?php

use Dom\Document;

require_once __DIR__ . '/../modele/modele_filiere.php';
require_once __DIR__ . '/../modele/modele_etudiant.php';
require_once __DIR__ . '/../modele/modele_admin.php';
require_once __DIR__ . '/../modele/modele_notes.php';
require_once __DIR__ . '/../modele/modele_matiere.php';
require_once __DIR__ . '/../modele/modele_prof.php';
require_once __DIR__ . '/../modele/modele_documents.php';



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
    create_etudiant();
    
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
    exit();
}

function note_admin(){
    $res = Matiere::display();
    require_once __DIR__.'/../view/note_admin.php';
    
}
function id_etudiant_parNom_action($nom){
    $id_nom = etudiant_id_par_nom($nom);
    return $id_nom;
}

function add_note(){
    $res=Note::note_etud_display();
    require_once __DIR__.'/../view/ajouter_note.php';
}
function edite_note(){
    if(!empty($_GET["id"]) && !empty($_GET["nom_etud"]) && !empty($_GET["matiere"]) && !empty($_GET["type"]) && !empty($_GET["note"])){
        //$res=Note::note_etud_display();
        require_once __DIR__.'/../view/edite_note_view.php';

    }

}
function edite_note_action(){
    Note::edite_note_by_id();
}

function note_destroy(){
    if(!empty($_GET["id"])){
        Note::destroy($_GET["id"]);
        header("Location: ../view/note_admin.php");
        exit();
    }
}

function verify_note(){
    Note::create_note();
}

function document_display_action(){
    $res=Documents::display();
    require_once "../view/doc_view.php";
}

function ajouter_doc(){
    if(!empty($_POST["titre"]) && !empty($_POST["id_matiere"]) && isset($_FILES["fichier"])) {
        $fichier = "../uploaded_docs/" . $_FILES["fichier"]["name"];
        move_uploaded_file($_FILES["fichier"]["tmp_name"], $fichier);
        $doc = new Documents($_POST["titre"], $fichier, $_POST["id_matiere"]);
        $doc->ajouter();
    }

    // Load matieres and the view
    $res = Matiere::display();
    require_once "../view/ajouter_doc_view.php";
}


//mal9itch kifach ndir liha b view hada lah
function display_etudiants_par_filiere() {
    $res = display_filiers();
    echo '<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Liste des Étudiants par Filière</title>
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
        <style>
            body {
                background: #f0f2f5;
                font-family: Arial, sans-serif;
                padding-top: 40px;
                padding-bottom: 40px;
            }
            .container {
                max-width: 900px;
            }
            h3 {
                color: #003973;
            }
        </style>
    </head>
    <body>
        <div class="container">';

    foreach ($res as $r) {
        echo "<div class='my-5 p-4 bg-white shadow rounded'>";
        echo "<h3 class='mb-4'>Étudiants de la filière : <strong>{$r['nom']}</strong></h3>";

        $etudes = display_pare_filier($r["id_filiere"]);

        if (!empty($etudes)) {
            echo "
                <div class='table-responsive'>
                    <table class='table table-bordered table-striped'>
                        <thead class='table-dark'>
                            <tr>
                                <th>Nom et prénom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                            </tr>
                        </thead>
                        <tbody>
            ";
            foreach ($etudes as $e) {
                echo "
                            <tr>
                                <td>{$e['nom']}</td>
                                <td>{$e['email']}</td>
                                <td>{$e['telephone']}</td>
                            </tr>
                ";
            }
            echo "
                        </tbody>
                    </table>
                </div>
            ";
        } else {
            echo "<div class='alert alert-warning'>Aucun étudiant trouvé dans cette filière.</div>";
        }

        echo "</div>";
    }
    echo '<a href="../view/acceuil_admin.php" class="btn btn-dark">Go back to acceuil_admin</a>';
    echo '<button class="btn btn-warning"> <a href="../view/ajouter_etudiant.php">+ Ajouter Etudiant</a></button>';

    echo '</div></body></html>';
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
