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
    //*************** */
    
    
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

function forum_display(){
    $res = EspaceEtudiant::display();
    require_once __DIR__. '/../view/afficher_espace.php';
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
        <title>Étudiants par Filière - EduTrack</title>
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
        <style>
            :root {
                --bleu: #003973;
                --or: #d4af37;
                --or-hover: #e8c766;
                --gris-clair: #f8f9fa;
                --blanc: #ffffff;
            }

            body {
                background-color: var(--gris-clair);
                font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
                padding-top: 50px;
            }

            .container {
                max-width: 1000px;
                margin: 0 auto;
            }

            .top-btn {
                display: flex;
                justify-content: flex-end;
                margin-bottom: 30px;
            }

            .filiere-card {
                background-color: var(--blanc);
                border-radius: 12px;
                padding: 25px;
                margin-bottom: 40px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
                border-left: 5px solid var(--bleu);
            }

            h3 {
                color: var(--bleu);
                margin-bottom: 20px;
            }

            .btn-custom {
                background-color: var(--or);
                border: none;
                color: #000;
                font-weight: 600;
                padding: 10px 20px;
                border-radius: 8px;
                text-decoration: none;
                transition: background-color 0.3s ease;
            }

            .btn-custom:hover {
                background-color: var(--or-hover);
                color: #000;
            }

            .bottom-btn {
                text-align: center;
                margin-top: 50px;
            }

            .table thead {
                background-color: var(--bleu);
                color: white;
            }

            .table tbody tr:hover {
                background-color: #f1f1f1;
            }

            .alert-warning {
                background-color: #fff3cd;
                color: #856404;
                border: 1px solid #ffeeba;
                border-radius: 6px;
                padding: 12px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="top-btn">
                <a href="../view/ajouter_etudiant.php" class="btn btn-custom">+ Ajouter Étudiant</a>
            </div>
    ';

    foreach ($res as $r) {
        echo "<div class='filiere-card'>";
        echo "<h3>Étudiants de la filière : <strong>{$r['nom']}</strong></h3>";

        $etudes = display_pare_filier($r["id_filiere"]);

        if (!empty($etudes)) {
            echo "
                <div class='table-responsive'>
                    <table class='table table-bordered'>
                        <thead>
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
            echo "<div class='alert alert-warning mt-3'>Aucun étudiant trouvé dans cette filière.</div>";
        }

        echo "</div>";
    }

    echo '
        <div class="bottom-btn">
            <a href="../view/acceuil_admin.php" class="btn btn-dark">← Retour à l\'accueil</a>
        </div>
        </div>
    </body>
    </html>';
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
