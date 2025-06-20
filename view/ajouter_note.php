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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Note - EduTrack</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/index10.css">
    <style>
        
    </style>
</head>
<body>

    <div class="form-card">
        <div class="section-header">
            <h3>Ajouter une Note</h3>
        </div>

        <form action="../view/trait_info.php" method="post">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom d'Étudiant</label>
                <input type="text" name="nom" id="nom" placeholder="Nom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="matiere" class="form-label">Matière</label>
                <select id="matiere" name="matiere" class="form-control" required>
                    <option value="">--Choisier matiere--</option>
                    <?php
                    $res = Matiere::display();
                    foreach($res as $ligne){
                        echo "<option value='{$ligne['id_matiere']}'>{$ligne['nom']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type d'évaluation</label>
                <select id="type" name="type" class="form-control" required>
                    <?php 
                    $types = ['CC', 'TP', 'EFM', 'Projet'];
                    foreach ($types as $t) {
                        echo "<option value=\"$t\">$t</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="note" class="form-label">Note</label>
                <input type="number" id="note" name="note" class="form-control" min="0" max="20" step="0.5" required>
            </div>
            <button type="submit" class="btn btn-success">Enregistrer la note</button>
        </form>
        <a href="../view/acceuil_admin.php" class="btn btn-dark">Go back to acceuil_admin</a>
    </div>

</body>
</html>
