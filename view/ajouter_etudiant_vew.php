<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}
require_once __DIR__."/../controller/connexions.php";
$res=display_filiers();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/index8.css">
    <script src="../bootstrap/js/bootstrap.js"></script>
    <title>Ajouter un Étudiant</title>
    <style>
        
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        Ajouter un Nouvel Étudiant
                    </div>
                    <div class="card-body p-5">
                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="mb-4 text-center">
                                <div class="photo-placeholder" id="photoPlaceholder">
                                    <i class="bi bi-camera photo-icon"></i>
                                    <img id="previewImage" src="#" alt="Preview" style="display: none; width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <input type="file" id="photoInput" accept="image/*" class="d-none" name="photo" required>
                                <small class="text-muted">Cliquez pour ajouter une photo</small>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="telephone" class="form-label">Téléphone</label>
                                    <input type="tel" class="form-control" id="telephone" name="tele" required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <label for="dateNaissance" class="form-label">Date de naissance</label>
                                    <input type="date" class="form-control" id="dateNaissance" name="date_nais" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="genre" class="form-label">Genre</label>
                                    <select class="form-select" id="genre" name="genre" required>
                                        <option selected disabled>Choisir...</option>
                                        <option value="M">Masculin</option>
                                        <option value="F">Féminin</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">Mot de pass</label>
                                    <input type="text" class="form-control" id="password" name="password" required>
                                </div>

            <!--************************-->
                                <div class="col-md-6 mb-3">
                                    <label for="filiere" class="form-label">Filière</label>
                                    <select class="form-select" id="filiere" name="filiere">
                                        <option selected disabled>Choisir...</option>
                                        <?php 
                                        foreach($res as $f){
                                            echo "<option value='".$f["id_filiere"]."'>".$f["nom"]."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                            </div>


                            <div class="mb-4">
                                <label for="niveau" class="form-label">Niveau</label>
                                <select class="form-select" id="niveau" name="niveau">
                                    <option selected disabled>Choisir...</option>
                                    <option value="1">Niveau 1</option>
                                    <option value="2">Niveau 2</option>
                                </select>
                            </div>


                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <a href="../view/acceuil_admin.php"  class="btn btn-outline-secondary me-md-2">Annuler</a>
                                <button type="submit" class="btn btn-gold">Enregistrer</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <script>
        document.getElementById("photoPlaceholder").addEventListener("click", function () {
            document.getElementById("photoInput").click();
        });

        document.getElementById("photoInput").addEventListener("change", function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const previewImage = document.getElementById("previewImage");
                    previewImage.src = e.target.result;
                    previewImage.style.display = "block";
                };
                reader.readAsDataURL(file);
            }
        });
    </script>


</body>
</html>