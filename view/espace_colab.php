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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../css/index15.css">
    <title>Espace Collaboratif</title>
    <style>
        
    </style>
</head>
<body>

    <div class="container mt-5">
        <b>Espace Collaboratif</b>
        
        <form action="../view/trait_espace.php" method="post">
            <input type="hidden" placeholder="Name" class="form-control" name="nom" value="<?php echo $_SESSION["etudiant"]->getNom() ?>">
            <input type="hidden" placeholder="Email" class="form-control" name="email" value="<?php echo $_SESSION["etudiant"]->getEmail() ?>" >
            <textarea class="form-control" placeholder="Message" name="contenu" required></textarea>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">SEND</button>
                <a href="../view/acceuil_etudiants.php" class="btn btn-secondary">Retour</a>
            </div>
        </form>
    </div>
</body>
</html>
