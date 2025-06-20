<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}
// Supposé que $res est défini avec les matières
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Ajouter un Document</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="../fontawesome-free-6.7.1-web/css/all.css"/>
  <link rel="stylesheet" href="../css/index6.css">
  <style>
    
  </style>
</head>
<body>

  <div class="form-box">
    <h2>Ajouter un Document</h2>
    <form action="./ajouter_document.php" method="post" enctype="multipart/form-data">
        <div class="mb-4 form-group">
            <label for="titre"><i class="fas fa-heading"></i> Titre du document</label>
            <input type="text" name="titre" id="titre" class="form-control" placeholder="Ex : Cours de PHP - Partie 1" required>
        </div>

        <div class="mb-4 form-group">
            <label for="fichier"><i class="fas fa-file-pdf"></i> Fichier PDF</label>
            <div class="custom-file-input">
            <label class="file-label" for="fichier">
                <span class="file-text"><i class="fas fa-cloud-upload-alt"></i> Choisir un fichier</span>
                <span class="badge bg-secondary">PDF uniquement</span>
            </label>
            <input type="file" name="fichier" id="fichier" class="form-control d-none" accept="application/pdf" required>
            <div id="file-selected" class="file-selected"></div>
            </div>
        </div>

        <div class="mb-4 form-group">
            <label for="id_matiere"><i class="fas fa-book"></i> Matière</label>
            <select name="id_matiere" id="id_matiere" class="form-control" required>
            <option value="" disabled selected>-- Sélectionnez une matière --</option>
            <?php
            foreach ($res as $r) {
                echo "<option value='" . $r['id_matiere'] . "'>" . $r['nom'] . "</option>";
            }
            ?>
            </select>
        </div>

        <button type="submit" class="btn btn-submit">
            <i class="fas fa-plus-circle"></i> Ajouter le document
        </button>

        <div class="btn btn-submit">
            <a href="../view/docs.php" class="fas fa-arrow-left">  Retour</a> 
        </div>


    
        
    </form>
  </div>

  

</body>
</html>