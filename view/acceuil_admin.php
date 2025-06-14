<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord Admin - EduTrack</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <style>
        body {
            background: linear-gradient(to right, #003973, #E5E5BE);
            min-height: 100vh;
        }
        .dashboard-box {
            border-radius: 15px;
            background-color: white;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            padding: 30px;
            text-align: center;
            transition: 0.3s;
        }
        .dashboard-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            transform: scale(1.1);
            background-color: #F5F5F5;
        }
        img{
            border-radius: 50%;
            width: 50px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark mb-5">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1" >EduTrack - Admin
                <img src="../Images/EduTrack.jpg" alt="EduTrack">
            </span>
            <a href="#" class="btn btn-outline-light">Déconnexion</a>
        </div>
    </nav>

    <div class="container">
        <h2 class="text-center text-white mb-4">Tableau de Bord de l'Administrateur</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="dashboard-box">
                        <h4>📘 Gestion des Matières</h4>
                        <p>Ajouter, modifier ou supprimer des matières.</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="dashboard-box">
                        <h4>📅 Emploi du Temps</h4>
                        <p>Consulter et organiser les horaires des cours.</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="dashboard-box">
                        <h4>📊 Suivi des Notes</h4>
                        <p>Gérer les notes des étudiants par matière.</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="dashboard-box">
                        <h4>📎 Documents</h4>
                        <p>Ajouter des fichiers liés aux cours.</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="dashboard-box">
                        <h4>💬 Forum Étudiant</h4>
                        <p>Consulter ou modérer les messages du mini-forum.</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="dashboard-box">
                        <h4>👨‍🎓 Ajouter Étudiants</h4>
                        <p>Créer un nouveau compte étudiant avec ses informations.</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="dashboard-box">
                        <h4>📄 Liste des Étudiants</h4>
                        <p>Voir tous les étudiants inscrits avec leurs informations.</p>
                    </div>
                </a>
            </div>


        </div>
    </div>

</body>
</html>
