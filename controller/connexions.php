<?php
use Dom\Document;
require_once __DIR__ . '/../modele/modele_filiere.php';
require_once __DIR__ . '/../modele/modele_etudiant.php';
require_once __DIR__ . '/../modele/modele_admin.php';
require_once __DIR__ . '/../modele/modele_notes.php';
require_once __DIR__ . '/../modele/modele_matiere.php';
require_once __DIR__ . '/../modele/modele_prof.php';
require_once __DIR__ . '/../modele/modele_documents.php';
require_once __DIR__ . '/../modele/modele_espace.php';
require_once __DIR__ . '/../modele/modele_cours.php';


function loginEtudiant_action(){
    if(!empty($_POST["email"]) && !empty($_POST["password"])){
        $res=loginEtudiant();
        if($res!=false){
            if ($_POST["password"]==$res["mot_de_pass"]){
                session_start();
                $etudiant= new Etudiant($res["id_etudiant"], $res["telephone"], $res["nom"], $res["email"], $res["photo"],$res["id_filiere"], $res["mot_de_pass"]);
                $_SESSION["etudiant"]=$etudiant;
                $_SESSION["user"]=$res["nom"];
                //var_dump($_SESSION["etudiant"]);
                //var_dump($_SESSION["user"]);
                header("Location: ../view/acceuil_etudiants.php?id_etudiant= ".$res["id_etudiant"]."&id_filiere=".$res["id_filiere"]."&niveau=".$res["niveau"]."");
                exit();
            }else{
                //echo "<script>alert('mot de pass incorrect')</script>";
                header("Location: ../view/trait_connexion.php");
                exit();
            }
        }else{
            //echo "<script>alert('email n'existe pas')</script>";
            header("Location: ../view/connexion_etudiant.php");
            exit();
        }
    }else{
        //echo "<script>alert('veullez remplire tous les champs')</script>";
        header("Location: ../view/connexion_etudiant.php");
        exit();
    }
}
//les alerts makhdaminch ila drtihom 9bl l header()


function choix_connexion(){
    require_once __DIR__. '/../view/choix_connexion.php';
    
}

function connexion_admin(){
    loginAdmin_action();
    
    
}
//session_start();


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


function forum_distroy(){
    if (!empty($_GET["id"])) {
        EspaceEtudiant::destroy($_GET["id"]);
        header("Location: ../view/afficher_espace.php");
        exit();
    }
}

function delete_etudiant(){
    Etudiant::destroy();
    header("Location: ../view/list_etudiant.php");
}

function edite_etudiant(){
    if (!empty($_POST["nom"]) && !empty($_POST["tele"]) && !empty($_POST["email"]) && !empty($_POST["genre"]) && !empty($_POST["date_nais"]) && !empty($_POST["niveau"]) && !empty($_FILES["photo"]) && !empty($_POST["filiere"]) && !empty($_POST["password"]) && !empty($_POST["id"])) {
        Etudiant::edit();
        header("Location: ../view/list_etudiant.php");
        exit();
    }
    require_once "../view/edite_etudiant_view.php";
}

function display_emploi_etudiant($f, $n){
    $result=Emploi::display_for_etudiant_by_filiere($f, $n);
    return $result;
}
//$_SESSION["id_filiere"]=1;
//var_dump(display_emploi_etudiant());




function delete_forums_all(){
    EspaceEtudiant::destroy_All();
    header('location: ../view/afficher_espace.php');
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
        header("Location: ../view/docs.php");
        exit();
    }
    
    // Load matieres and the view
    $res = Matiere::display();
    require_once "../view/ajouter_doc_view.php";
}

function delete_docs(){
    Documents::destroy();
    header("Location: ../view/docs.php");
    exit();
}

function espace(){
    require_once __DIR__. '/../view/espace_colab.php';
}

function espace_etu(){
    EspaceEtudiant::create();
    require_once __DIR__. '/../view/acceuil_etudiants.php';
}
function etud_note_desplay($id){
    $res = Matiere::display();
    require_once "../view/not_etud_display.php";
}

function ajouter_emploi(){
    if (!empty($_POST["filiere"])){
        Emploi::create();
        header("Location: ../view/ajouter_emploi.php");
    }
    $res=display_filiers();
    require_once "../view/ajouter_emploi_view.php";
}

function affiche_matiere(){
    $resu=Matiere::display();
    require_once __DIR__. '/../view/afficherMatiere.php';
}

//mal9itch kifach ndir liha b view hada lah
function display_etudiants_par_filiere() {
    $res = display_filiers();
    echo '<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Étudiants par Filière - EduTrack</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../fontawesome-free-6.7.1-web/css/all.css">
        <style>
            :root {
                --bleu: #003973;
                --beige: #f5f5ee;
                --or: #d4af37;
                --or-hover: #e8c766;
            }

            body {
                display: flex;
                justify-content: center;
                align-items: flex-start;
                min-height: 100vh;
                background: url("../images/background_admin.png") no-repeat center center;
                background-size: cover;
                margin: 0;
                padding: 40px 20px;
                font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            }

            .container-etudiants {
                background-color: #fff;
                padding: 30px;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                max-width: 1200px;
                width: 100%;
            }

            h2 {
                text-align: center;
                color: var(--bleu);
                margin-bottom: 40px;
            }

            .btn-ajouter {
                background-color: var(--or);
                color: #000;
                font-weight: bold;
            }

            .btn-ajouter:hover {
                background-color: var(--or-hover);
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            thead tr {
                background-color: var(--bleu);
                color: white;
            }

            th, td {
                text-align: center;
                padding: 12px 14px;
                border-bottom: 1px solid #ddd;
            }

            tbody tr:hover {
                background-color: #f9f9f9;
            }

            .btn-action i {
                margin: 0 4px;
            }

            .niveau-label {
                background-color: var(--beige);
                font-weight: bold;
                padding: 10px;
                text-align: left;
                border-left: 4px solid var(--bleu);
                margin-top: 20px;
            }

            @media (max-width: 768px) {
                table, thead, tbody, th, td, tr {
                    display: block;
                }

                thead {
                    display: none;
                }

                td {
                    text-align: left;
                    padding-left: 50%;
                    position: relative;
                    border-bottom: 1px solid #ccc;
                }

                td::before {
                    content: attr(data-label);
                    position: absolute;
                    left: 16px;
                    font-weight: bold;
                    color: var(--bleu);
                }
            }
        </style>
    </head>
    <body>
        <div class="container-etudiants">
            <h2>🎓 Étudiants par Filière</h2>
            <div class="d-flex justify-content-between mb-3">
                <a href="acceuil_admin.php" class="btn btn-secondary">← Retour</a>
                <a href="ajouter_etudiant.php" class="btn btn-ajouter">+ Ajouter un étudiant</a>
            </div>';

    foreach ($res as $r) {
        echo "<h4 style='color:#003973;margin-top:30px;'>Filière : {$r['nom']}</h4>";

        $etudes = display_pare_filier($r["id_filiere"]);
        $niv1 = 0;
        $niv2 = 0;

        if (!empty($etudes)) {
            echo "<table class='table table-striped'>";
            echo "<thead>
                    <tr>
                        <th>Nom complet</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Genre</th>
                        <th>Date de Naissance</th>
                        <th>Niveau</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>";

            foreach ($etudes as $e) {
                if ($e['niveau'] == 1 && $niv1 == 0) {
                    echo "<tr><td colspan='7' class='niveau-label'>🥇 Niveau 1</td></tr>";
                    $niv1++;
                }
                if ($e['niveau'] == 2 && $niv2 == 0) {
                    echo "<tr><td colspan='7' class='niveau-label'>🥈 Niveau 2</td></tr>";
                    $niv2++;
                }

                echo "<tr>
                        <td data-label='Nom complet'>{$e['nom']}</td>
                        <td data-label='Email'>{$e['email']}</td>
                        <td data-label='Téléphone'>{$e['telephone']}</td>
                        <td data-label='Genre'>{$e['genre']}</td>
                        <td data-label='Date de Naissance'>{$e['date_nissance']}</td>
                        <td data-label='Niveau'>{$e['niveau']}</td>
                        <td data-label='Actions'>
                            <a href='edite_etudiant.php?id={$e["id_etudiant"]}&telephone={$e["telephone"]}&nom={$e["nom"]}&email={$e["email"]}&genre={$e["genre"]}&date_naissance={$e["date_nissance"]}&niveau={$e["niveau"]}&photo={$e["photo"]}&mo_de_pass={$e["mot_de_pass"]}&id_filiere={$r["id_filiere"]}' class='btn btn-sm btn-outline-warning btn-action' title='Modifier'>
                                <i class='fas fa-pen'></i>
                            </a>
                            <a href='delete_etudiant.php?id={$e["id_etudiant"]}' class='btn btn-sm btn-outline-danger btn-action' title='Supprimer'>
                                <i class='fas fa-trash-alt'></i>
                            </a>
                        </td>
                    </tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<div class='alert alert-warning mt-3'>Aucun étudiant trouvé dans cette filière.</div>";
        }
    }

    echo '</div>
        <script src="../bootstrap/js/bootstrap.js"></script>
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

function affiche_docs(){
    $res = Documents::document_affiche();
    $total_documents = Documents::count_documents();
    $total_matieres = Documents::count_matieres();
    require_once __DIR__. '/../view/afficher_document.php';
}


?>
