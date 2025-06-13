<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../fontawesome-free-6.7.1-web/css/all.css">
    <title>Notes</title>
    <style>
        :root {
            --bleu-profond: #003973;
            --bleu-moyen: #2a5a8a;
            --bleu-clair: #e6f0fa;
            --beige-doux: #E5E5BE;
            --beige-clair: #f5f5ee;
            --accent-or: #d4af37;
            --accent-or-hover: #e8c766;
            --blanc: #ffffff;
            --noir: #222222;
            --gris: #6c757d;
            --success: #28a745;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Montserrat;
            background-color: var(--beige-clair);
            color: var(--noir);
            line-height: 1.7;
        }
        .app-header {
            background: rgba(0, 57, 115, 0.95);
            backdrop-filter: blur(8px);
            color: var(--beige-doux);
            padding: 0.8rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .app-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .app-logo img {
            height: 40px;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        }

        .app-logo h1 {
            font-weight: 600;
            font-size: 1.4rem;
            letter-spacing: 0.5px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--accent-or);
        }

        .user-info {
            text-align: right;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.95rem;
        }

        .user-role {
            font-size: 0.8rem;
            opacity: 0.8;
        }

        .app-container {
            display: flex;
            margin-top: 60px;
        }

        .sidebar {
            width: 250px;
            background: var(--bleu-profond);
            color: var(--beige-doux);
            height: calc(100vh - 60px);
            position: fixed;
            padding: 1.5rem 0;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .nav-menu {
            list-style: none;
        }

        .nav-item {
            margin-bottom: 5px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--beige-doux);
            text-decoration: none;
            padding: 0.8rem 1.5rem;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .nav-link:hover, .nav-link.active {
            background-color: rgba(255, 255, 255, 0.15);
            border-left: 3px solid var(--accent-or);
        }

        .nav-link i {
            width: 20px;
            text-align: center;
        }

        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 2rem;
            background-color: var(--blanc);
            min-height: calc(100vh - 60px);
            border-radius: 10px 0 0 0;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.05);
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--beige-clair);
        }

        .page-title {
            color: var(--bleu-profond);
            font-size: 1.8rem;
            position: relative;
        }

        .page-title::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--accent-or);
        }


        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .dashboard-card {
            background: var(--blanc);
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border-top: 3px solid var(--bleu-profond);
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .card-title {
            color: var(--bleu-profond);
            font-size: 1.1rem;
            font-weight: 600;
        }

        .card-icon {
            width: 40px;
            height: 40px;
            background-color: var(--bleu-clair);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--bleu-profond);
        }

        .card-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--bleu-profond);
            margin-bottom: 0.5rem;
        }

        .card-text {
            color: var(--gris);
            font-size: 0.9rem;
        }


        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 1.5rem 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .data-table th {
            background-color: var(--bleu-profond);
            color: var(--beige-doux);
            padding: 12px 15px;
            text-align: left;
            font-weight: 500;
        }

        .data-table td {
            padding: 12px 15px;
            border-bottom: 1px solid var(--beige-clair);
        }

        .data-table tr:hover {
            background-color: var(--bleu-clair);
        }


        .form-card {
            background: var(--blanc);
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            max-width: 800px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--bleu-profond);
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--bleu-profond);
            box-shadow: 0 0 0 3px rgba(0, 57, 115, 0.1);
            outline: none;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
        }

        .btn-primary {
            background-color: var(--bleu-profond);
            color: var(--blanc);
        }

        .btn-primary:hover {
            background-color: var(--bleu-moyen);
            transform: translateY(-2px);
        }

        .btn-success {
            background-color: var(--success);
            color: var(--blanc);
        }

        .btn-success:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                width: 70px;
                overflow: hidden;
            }
            .nav-link span {
                display: none;
            }
            .main-content {
                margin-left: 70px;
            }
        }

        @media (max-width: 768px) {
            .app-header {
                flex-direction: column;
                padding: 0.8rem;
                text-align: center;
            }
            .user-profile {
                margin-top: 0.5rem;
            }
            .dashboard-cards {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                display: none;
            }
            .main-content {
                margin-left: 0;
            }
            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
        </style>

</head>
<body>

    <header class="app-header">
        <div class="app-logo">
            <img src="#" alt="EduTrack">
            <h1>EduTrack</h1>
        </div>
        <div class="user-profile">
            <div class="user-info">
                <div class="user-name">Nom</div>
                <div class="user-role">Filiere</div>
            </div>
            <img src="#" alt="Photo profil" class="user-avatar">
        </div>
    </header>


    <div class="app-container">

        <nav class="sidebar">
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-home"></i>
                        <span>Tableau de bord</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-book"></i>
                        <span>Mes Matières</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Emploi du temps</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-chart-bar"></i>
                        <span>Mes Notes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-file-pdf"></i>
                        <span>Ressources</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Espace Collaboratif</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Déconnexion</span>
                    </a>
                </li>
            </ul>
        </nav>


        <main class="main-content">
            <div class="page-header">
                <h2 class="page-title">Tableau de Bord</h2>
                <div class="breadcrumb">
                    <span>Accueil</span> / <span>Tableau de bord</span>
                </div>
            </div>


            <div class="dashboard-cards">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h3 class="card-title">Matières suivies</h3>
                        <div class="card-icon">
                            <i class="fas fa-book"></i>
                        </div>
                    </div>
                    <div class="card-value">6</div>
                    <p class="card-text">Dont 2 nouvelles cette semaine</p>
                </div>
                <div class="dashboard-card">
                    <div class="card-header">
                        <h3 class="card-title">Moyenne Générale</h3>
                        <div class="card-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                    <div class="card-value">14.5</div>
                    <p class="card-text">+0.8 vs semestre dernier</p>
                </div>
                <div class="dashboard-card">
                    <div class="card-header">
                        <h3 class="card-title">Prochains Cours</h3>
                        <div class="card-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                    <div class="card-value">PHP Avancé</div>
                    <p class="card-text">Demain, 10h - Salle B204</p>
                </div>
                <div class="dashboard-card">
                    <div class="card-header">
                        <h3 class="card-title">Ressources</h3>
                        <div class="card-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                    </div>
                    <div class="card-value">12</div>
                    <p class="card-text">Documents non consultés</p>
                </div>
            </div>

            <div class="section-header">
                <h3>Emploi du Temps - Semaine 42</h3>
                <a href="#" class="btn btn-primary">Voir tout</a>
            </div>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>Heure</th>
                        <th>Lundi</th>
                        <th>Mardi</th>
                        <th>Mercredi</th>
                        <th>Jeudi</th>
                        <th>Vendredi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>08h-10h</td>
                        <td>Algorithmique (A101)</td>
                        <td></td>
                        <td>Base de données (B204)</td>
                        <td>PHP Avancé (C302)</td>
                        <td>UI/UX Design (A101)</td>
                    </tr>
                    <tr>
                        <td>10h-12h</td>
                        <td></td>
                        <td>JavaScript (B204)</td>
                        <td>Projet Web (Labo 3)</td>
                        <td></td>
                        <td>Anglais Technique (D105)</td>
                    </tr>
                    <tr>
                        <td>14h-16h</td>
                        <td>Gestion de projet (C302)</td>
                        <td>Framework JS (Labo 2)</td>
                        <td></td>
                        <td>Algorithmique (A101)</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>