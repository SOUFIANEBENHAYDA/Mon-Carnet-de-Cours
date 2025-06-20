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
    <title>Ajouter une Matière - EduTrack</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/index9.css">
    <style>
        
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Ajouter une Matière</h2>
        <form action="../view/trait_matiere.php" method="post">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom de la matière</label>
                <input type="text" id="nom" name="nom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="coef" class="form-label">Coefficient</label>
                <input type="number" step="0.1" min="0" id="coef" name="coef" class="form-control" required>
            </div>

            <div class="mb-4">
                <label for="idp" class="form-label">Professeur responsable</label>
                <select id="idp" name="idp" class="form-control" required>
                    <option value="" disabled selected>Choisir un professeur...</option>
                    <?php
                    foreach ($result as $r) {
                        echo "<option value='{$r['id_prof']}'>{$r['nom']}</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-submit">Ajouter la matière</button>
        </form><br>
        <a href="../view/acceuil_admin.php" class="btn btn-dark">Go back to acceuil_admin</a>
    </div>

</body>
</html>
