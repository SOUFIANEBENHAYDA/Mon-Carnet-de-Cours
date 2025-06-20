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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin - Gestion des Notes</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="../fontawesome-free-6.7.1-web/css/all.css"/>
  <link rel="stylesheet" href="../css/index17.css">

  <style>
    
  </style>
</head>
<body>

<div class="container-notes">
  <h2>🧾 Visualisation des Notes - Étudiant</h2>

  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Étudiant</th>
        <th>Matière</th>
        <th>Type de note</th>
        <th>Note</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require_once "../controller/connexions.php";


      $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

      $res = Note::note_pour_etudiant($id);
      $moyennes = [];

      foreach ($res as $r) {

        $matiere = $r['matiere'];
        if (!isset($moyennes[$matiere])) {
          $moyennes[$matiere] = $r['moyenne'];
        }

        echo '<tr>
          <td>' . $r["ide"] . '</td>
          <td>' . $r["nom_etud"] . '</td>
          <td>' . $r["matiere"] . '</td>
          <td>' . $r["type_note"] . '</td>
          <td>' . $r["note"] . '</td>
        </tr>';
      }
      ?>
    </tbody>
  </table>

  <h4 class="mt-5 mb-3 text-center text-secondary">📊 Moyennes par Matière</h4>
  <table>
    <thead>
      <tr>
        <th>Matière</th>
        <th>Moyenne</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($moyennes as $matiere => $moy) {
        echo '<tr>
          <td>' . $matiere . '</td>
          <td>' . $moy . '</td>
        </tr>';
      }
      ?>
    </tbody>
  </table>

  <div class="text-center mt-4">
    <a href="../view/acceuil_etudiants.php" class="btn btn-secondary">
      <i class="fas fa-arrow-left"></i> Retour à l'accueil
    </a>
  </div>
</div>

<script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>
