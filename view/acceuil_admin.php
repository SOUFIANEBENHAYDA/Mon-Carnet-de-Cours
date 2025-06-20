<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord Admin - EduTrack</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <style>
        body {
            background: linear-gradient(to right, #e0f7fa, #f1f8e9);
            min-height: 100vh;
        }

        .dashboard-box {
            border-radius: 15px;
            color: #333;
            padding: 30px;
            text-align: center;
            transition: 0.3s ease-in-out;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
        }

        .dashboard-box:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

   
        .matiere       { background: linear-gradient(135deg, #e3f2fd, #ffffff); }
        .emploi        { background: linear-gradient(135deg, #fff3e0, #ffffff); }
        .notes         { background: linear-gradient(135deg, #ede7f6, #ffffff); }
        .documents     { background: linear-gradient(135deg, #f1f8e9, #ffffff); }
        .forum         { background: linear-gradient(135deg, #fce4ec, #ffffff); }
        .ajouter       { background: linear-gradient(135deg, #e8f5e9, #ffffff); }
        .liste         { background: linear-gradient(135deg, #fffde7, #ffffff); }

        img {
            border-radius: 50%;
            width: 50px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-light bg-light mb-5 shadow-sm">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">
            EduTrack - Admin
            <img src="../Images/EduTrack.jpg" alt="EduTrack">
        </span>
        <a href="../view/deconnexionadmin.php" class="btn btn-outline-dark">Déconnexion</a>
    </div>
</nav>

<div class="container">
    <h2 class="text-center text-dark mb-4">Tableau de Bord de l'Administrateur</h2>

    <div class="row g-4">
        <div class="col-md-4">
            <a href="../view/ajt_matiere.php" class="text-decoration-none text-dark">
                <div class="dashboard-box matiere">
                    <h4>📘 Gestion des Matières</h4>
                    <p>Ajouter, modifier ou supprimer des matières.</p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="ajouter_emploi.php" class="text-decoration-none text-dark">
                <div class="dashboard-box emploi">
                    <h4>📅 Emploi du Temps</h4>
                    <p>Consulter et organiser les horaires des cours.</p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="../view/note_ad.php" class="text-decoration-none text-dark">
                <div class="dashboard-box notes">
                    <h4>📊 Suivi des Notes</h4>
                    <p>Gérer les notes des étudiants par matière.</p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="../view/docs.php" class="text-decoration-none text-dark">
                <div class="dashboard-box documents">
                    <h4>📎 Documents</h4>
                    <p>Ajouter des fichiers liés aux cours.</p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="../view/lien_forum.php" class="text-decoration-none text-dark">
                <div class="dashboard-box forum">
                    <h4>💬 Forum Étudiant</h4>
                    <p>Consulter ou modérer les messages du mini-forum.</p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="../view/ajouter_etudiant.php" class="text-decoration-none text-dark">
                <div class="dashboard-box ajouter">
                    <h4>👨‍🎓 Ajouter Étudiants</h4>
                    <p>Créer un nouveau compte étudiant avec ses informations.</p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="../view/list_etudiant.php" class="text-decoration-none text-dark">
                <div class="dashboard-box liste">
                    <h4>📄 Liste des Étudiants</h4>
                    <p>Voir tous les étudiants inscrits avec leurs informations.</p>
                </div>
            </a>
        </div>
    </div>
</div>

</body>
</html>
