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
  <link rel="stylesheet" href="../css/index18.css">

  <style>
    
  </style>
</head>
<body>

  <div class="container-notes">
    <h2>🧾 Gestion des Notes - Admin</h2>

    <div class="d-flex justify-content-end mb-4">
      <button class="btn btn-ajouter"> <a href="../view/ajt_note.php">+ Ajouter une note</a></button>
    </div>

    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Étudiant</th>
          <th>Matière</th>
          <th>type de note</th>
          <th>Note</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        //had l3iba tani hhhhhh
        require_once "../controller/connexions.php";
        $res=Note::note_etud_display();
        foreach($res as $r){
          echo'
          <tr>
          <td>'.$r["ide"].'</td>
          <td>'.$r["nom_etud"].'</td>
          <td>'.$r["matiere"].'</td>
          <td>'.$r["type_note"].'</td>
          <td>'.$r["note"].'</td>
          <td>
          <button class="btn btn-sm btn-outline-warning me-2" title="Modifier">
          <a href="edit_note.php?id='.$r["idn"].'&nom_etud='.$r["nom_etud"].'&matiere='.$r["matiere"].'&type='.$r["type_note"].'&note='.$r["note"].'" class="fas fa-pen"></a>
          </button>
          <button class="btn btn-sm btn-outline-danger" title="Supprimer">
          <a href="delete_note.php?id='.$r["idn"].'" class="fas fa-trash-alt"></a>
          </button>
          </td>
          </tr>';
          }
        ?>
      </tbody>
    </table>
    <a href="../view/acceuil_admin.php" class="btn btn-dark">Go back to acceuil_admin</a>
  </div>

  <script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>
