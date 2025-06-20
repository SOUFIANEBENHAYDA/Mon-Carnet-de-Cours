<?
?>
<?php
require_once __DIR__. '/../controller/connexions.php';
$res = Documents::document_affiche();
$resu=Matiere::display();
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

    //////////////////////// haaaaaa lmochkill 
    session_start();
if(!isset($_SESSION["user"])){
  header("Location: ../view/connexion_etudiant.php");
  exit();
}
    //var_dump($_SESSION["etudiant"]);
    $etud=$_SESSION["etudiant"];
    
    if(!empty($_GET["id_filiere"])&&!empty($_GET["niveau"])&&!empty($_GET["id_etudiant"])){
      $_SESSION["id_filiere"]=$_GET["id_filiere"];
      $_SESSION["niveau"]=$_GET["niveau"];
      $_SESSION["id_etudiant"]=$_GET["id_etudiant"];
    }
    //var_dump($_SESSION["id_filiere"]);

    $res=display_emploi_etudiant($_SESSION["id_filiere"], $_SESSION["niveau"]);
    ?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>EduTrack - Dashboard</title>
  <link rel="stylesheet" href="../fontawesome-free-6.7.1-web/css/all.css" />
  <link rel="stylesheet" href="../css/index2.css">
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
        <div class="user-role">Filiere: <?php echo $etud->getFilier(); ?></div>
      </div>

      <img src="<?php echo $etud->getPhoto() ; ?>" alt="Photo de profil" class="user-avatar" />
    </div>
  </header>

  <div class="app-container">
    <nav class="sidebar">
      <ul class="nav-menu">
        <li><a href="#" class="nav-link active"><i class="fas fa-home"></i> Tableau de bord</a></li>
        <li><a href="../view/lien_matiere.php" class="nav-link"><i class="fas fa-book"></i> Mes Matières</a></li>
        <li><a href="../view/etud_note.php?id=<?php echo $_SESSION["id_etudiant"]?>" class="nav-link"><i class="fas fa-chart-bar"></i> Mes Notes</a></li>
        <li><a href="../view/lien_docs.php" class="nav-link"><i class="fas fa-file-pdf"></i> Ressources</a></li>
        <li><a href="../view/lien_etdu_forum.php" class="nav-link"><i class="fas fa-users"></i> Espace Collaboratif</a></li>
        <li><a href="../view/deconnexion.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
      </ul>
    </nav>

    <main class="main-content">
      <div class="page-header">
        <h2 class="page-title">Tableau de Bord</h2>
        <div class="breadcrumb">Accueil / Tableau de bord</div>
      </div>

      <a href="../view/lien_matiere.php">
        <div class="dashboard-cards">
          <div class="dashboard-card" >
            <div class="card-header">
              <h3 class="card-title">Matières suivies</h3>
              <div class="card-icon"><i class="fas fa-book"></i></div>
            </div>
            <div class="card-value"><?php echo count($resu); ?></div>
            <p class="card-text">Dont 2 nouvelles cette semaine</p>
        </div>
      </a>

      <a href="../view/lien_etdu_forum.php">
        <div class="dashboard-card">
          <div class="card-header">
            <div class="card-icon"><i class="fas fa-people-group"></i></div>
            <h3 class="card-title">Espace collaboratif</h3>
          </div>
          <div class="card-value">&nbsp;</div>
          <p class="card-text">Partager votre question ou point de vue </p>
        </div>
      </a>

      
      <a href="../view/lien_docs.php">
        <div class="dashboard-card">
          <div class="card-header">
            <h3 class="card-title">Ressources</h3>
            <div class="card-icon"><i class="fas fa-file-alt"></i></div>
          </div>
          <h1><?= $total_documents ?></h1>
          <p class="card-text">Documents non consultés</p>
          </div>
        </div>
      </a>

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
            <th>Samedi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>08h-10h</td>
            <td><?php echo $res["lun1"]; ?></td>
            <td><?php echo $res["mar1"]; ?></td>
            <td><?php echo $res["mer1"]; ?></td>
            <td><?php echo $res["jeu1"]; ?></td>
            <td><?php echo $res["ven1"]; ?></td>
            <td><?php echo $res["sam1"]; ?></td>
          </tr>
          <tr>
            <td>10h-12h</td>
            <td><?php echo $res["lun2"]; ?></td>
            <td><?php echo $res["mar2"]; ?></td>
            <td><?php echo $res["mer2"]; ?></td>
            <td><?php echo $res["jeu2"]; ?></td>
            <td><?php echo $res["ven2"]; ?></td>
            <td><?php echo $res["sam2"]; ?></td>
          </tr>
          <tr>
            <td>14h-16h</td>
            <td><?php echo $res["lun3"]; ?></td>
            <td><?php echo $res["mar3"]; ?></td>
            <td><?php echo $res["mer3"]; ?></td>
            <td><?php echo $res["jeu3"]; ?></td>
            <td><?php echo $res["ven3"]; ?></td>
            <td><?php echo $res["sam3"]; ?></td>
          </tr>
          <tr>
            <td>16h-18h</td>
            <td><?php echo $res["lun4"]; ?></td>
            <td><?php echo $res["mar4"]; ?></td>
            <td><?php echo $res["mer4"]; ?></td>
            <td><?php echo $res["jeu4"]; ?></td>
            <td><?php echo $res["ven4"]; ?></td>
            <td><?php echo $res["sam4"]; ?></td>
          </tr>
        </tbody>
      </table>
    </main>
  </div>
</body>
</html>
