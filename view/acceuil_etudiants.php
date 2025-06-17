<?php
require_once __DIR__. '/../controller/connexions.php';
$res = Documents::document_affiche();
$total_documents = Documents::count_documents();
$total_matieres = Documents::count_matieres();
$groupes = [];
foreach ($res as $doc) {
    $matiere = $doc['nom_matiere'];
    if (!isset($groupes[$matiere])) {
        $groupes[$matiere] = [];
    }
    $groupes[$matiere][] = $doc;
}
?>

<!DOCTYPE html>
<html lang="fr">

    <?php
    //require_once "../modele/modele_etudiant.php"; wayak t7ayd l comment hhhh
    require_once "../controller/connexions.php";
    
    session_start();
    if(!isset($_SESSION["etudiant"])){
      header("Location: ../view/connexion_etudiant.php");
      exit();
    }else{
      $etud=$_SESSION["etudiant"];
    }


    ?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>EduTrack - Dashboard</title>
  <link rel="stylesheet" href="../fontawesome-free-6.7.1-web/css/all.css" />
  <style>
    :root {
      --bleu: #2c3e50;
      --violet: #6c5ce7;
      --beige: #f4f4f4;
      --blanc: #fff;
      --noir: #222;
      --gris: #777;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: "Montserrat", sans-serif;
      color: var(--noir);
      line-height: 1.6;
      background: linear-gradient(120deg, rgba(44, 62, 80, 0.9), rgba(108, 92, 231, 0.9)),
                  url('../Images/geometry.png');
      background-size: cover;
      background-attachment: fixed;
    }

    header.app-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: rgba(255, 255, 255, 0.95);
      padding: 1rem 2rem;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .app-logo {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .app-logo img {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 50%;
    }

    .app-logo h1 {
      font-size: 1.5rem;
      color: var(--violet);
    }

    .user-profile {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .user-info .user-name {
      font-weight: bold;
    }

    .user-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid var(--violet);
    }

    .app-container {
      display: flex;
      min-height: 100vh;
    }

    nav.sidebar {
      width: 240px;
      background-color: rgba(255, 255, 255, 0.95);
      padding: 2rem 1rem;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.05);
    }

    .nav-menu {
      list-style: none;
    }

    .nav-link {
      display: flex;
      align-items: center;
      padding: 0.75rem 1rem;
      margin: 0.5rem 0;
      color: var(--bleu);
      border-radius: 8px;
      text-decoration: none;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .nav-link:hover,
    .nav-link.active {
      background-color: var(--violet);
      color: white;
    }

    .nav-link i {
      margin-right: 10px;
    }

    .main-content {
      flex: 1;
      padding: 2rem;
      background-color: rgba(255, 255, 255, 0.9);
      animation: fadeIn 0.8s ease forwards;
      opacity: 0;
    }

    @keyframes fadeIn {
      to {
        opacity: 1;
      }
    }

    .page-title {
      font-size: 1.8rem;
      margin-bottom: 0.5rem;
      color: var(--bleu);
    }

    .breadcrumb {
      color: var(--gris);
      font-size: 0.9rem;
    }

    .dashboard-cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 1.5rem;
      margin: 2rem 0;
    }

    .dashboard-card {
      background: var(--blanc);
      padding: 1.2rem;
      border-radius: 10px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.07);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: default;
    }

    .dashboard-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .dashboard-card:hover .card-icon i {
      animation: pulse 1s infinite;
    }

    @keyframes pulse {
      0%, 100% {
        transform: scale(1);
        color: var(--bleu);
      }
      50% {
        transform: scale(1.1);
        color: var(--violet);
      }
    }

    .card-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .card-title {
      font-size: 1.2rem;
      font-weight: bold;
      color: var(--violet);
    }

    .card-icon i {
      font-size: 1.5rem;
      color: var(--bleu);
      transition: color 0.3s ease;
    }

    .card-value {
      font-size: 2rem;
      margin-top: 0.5rem;
      color: var(--bleu);
    }

    .card-text {
      font-size: 0.9rem;
      color: var(--gris);
    }

    .section-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 2rem;
    }

    .section-header h3 {
      color: var(--bleu);
    }

    .btn.btn-primary {
      background-color: var(--violet);
      color: white;
      padding: 0.5rem 1rem;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      text-decoration: none;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn.btn-primary:hover {
      background-color: var(--bleu);
    }

    .data-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
    }

    .data-table th,
    .data-table td {
      padding: 0.8rem;
      border: 1px solid #ccc;
      text-align: center;
    }

    .data-table th {
      background-color: var(--violet);
      color: white;
    }

    .data-table td {
      background-color: #fff;
    }
    
  </style>
</head>
<body>
  <header class="app-header">
    <div class="app-logo">
      <img src="../Images/EduTrack.jpg" alt="EduTrack" />
      <h1>EduTrack</h1>
    </div>
    <div class="user-profile">
      <div class="user-info">
        <div class="user-name"><?php echo $etud->getNom(); ?></div>
        <div class="user-role"><?php echo $etud->getFilier(); ?></div>
      </div>

      <img src="<?php echo $etud->getPhoto() ; ?>" alt="Photo de profil" class="user-avatar" />
    </div>
  </header>

  <div class="app-container">
    <nav class="sidebar">
      <ul class="nav-menu">
        <li><a href="#" class="nav-link active"><i class="fas fa-home"></i> Tableau de bord</a></li>
        <li><a href="#" class="nav-link"><i class="fas fa-book"></i> Mes Matières</a></li>
        <li><a href="#" class="nav-link"><i class="fas fa-calendar-alt"></i> Emploi du temps</a></li>
        <li><a href="#" class="nav-link"><i class="fas fa-chart-bar"></i> Mes Notes</a></li>
        <li><a href="../view/lien_docs.php" class="nav-link"><i class="fas fa-file-pdf"></i> Ressources</a></li>
        <li><a href="../view/lien_espace.php" class="nav-link"><i class="fas fa-users"></i> Espace Collaboratif</a></li>
        <li><a href="#" class="nav-link"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
      </ul>
    </nav>

    <main class="main-content">
      <div class="page-header">
        <h2 class="page-title">Tableau de Bord</h2>
        <div class="breadcrumb">Accueil / Tableau de bord</div>
      </div>

      <div class="dashboard-cards">
        <div class="dashboard-card" >
          <div class="card-header">
            <h3 class="card-title">Matières suivies</h3>
            <div class="card-icon"><i class="fas fa-book"></i></div>
          </div>
          <div class="card-value">6</div>
          <p class="card-text">Dont 2 nouvelles cette semaine</p>
        </div>

        <div class="dashboard-card">
          <div class="card-header">
            <h3 class="card-title">Moyenne Générale</h3>
            <div class="card-icon"><i class="fas fa-chart-line"></i></div>
          </div>
          <div class="card-value">14.5</div>
          <p class="card-text">+0.8 vs semestre dernier</p>
        </div>

        <div class="dashboard-card">
          <div class="card-header">
            <h3 class="card-title">Prochains Cours</h3>
            <div class="card-icon"><i class="fas fa-clock"></i></div>
          </div>
          <div class="card-value">PHP Avancé</div>
          <p class="card-text">Demain, 10h - Salle B204</p>
        </div>

        <div class="dashboard-card">
          <div class="card-header">
            <h3 class="card-title">Ressources</h3>
            <div class="card-icon"><i class="fas fa-file-alt"></i></div>
          </div>
          <h1><?= $total_documents ?></h1>
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
