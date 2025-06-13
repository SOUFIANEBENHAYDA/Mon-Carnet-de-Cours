<?php
require_once __DIR__."/../controller/connexions.php";
$res=display_filiers();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.js"></script>
    <title>Ajouter un Étudiant</title>
    <style>
        :root {
            --bleu-profond: #003973;
            --bleu-clair: #1a4d8c;
            --beige-clair: #f5f5ee;
            --accent-or: #d4af37;
            --accent-or-hover: #e8c766;
            --gris: #6c757d;
        }

        body {
            background: linear-gradient(135deg, var(--bleu-profond), var(--bleu-clair));
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            border: none;
        }

        .card-header {
            background-color: var(--bleu-profond);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 20px;
            text-align: center;
            font-weight: 600;
            font-size: 1.5rem;
        }

        .form-control:focus {
            border-color: var(--accent-or);
            box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.25);
        }

        .btn-gold {
            background-color: var(--accent-or);
            color: white;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-gold:hover {
            background-color: var(--accent-or-hover);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.4);
            color: white;
        }

        .form-label {
            font-weight: 500;
            color: var(--bleu-profond);
        }

        .photo-placeholder {
            width: 120px;
            height: 120px;
            background-color: var(--beige-clair);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            overflow: hidden;
            border: 2px dashed var(--gris);
            margin: 0 auto 20px;
        }

        .photo-placeholder:hover {
            border-color: var(--accent-or);
        }

        .photo-icon {
            font-size: 2rem;
            color: var(--gris);
        }
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
                        <form>

                            <div class="mb-4 text-center">
                                <div class="photo-placeholder" id="photoPlaceholder">
                                    <i class="bi bi-camera photo-icon"></i>
                                    <img id="previewImage" src="#" alt="Preview" style="display: none; width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <input type="file" id="photoInput" accept="image/*" class="d-none" name="photo">
                                <small class="text-muted">Cliquez pour ajouter une photo</small>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="telephone" class="form-label">Téléphone</label>
                                    <input type="tel" class="form-control" id="telephone" name="tele">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <label for="dateNaissance" class="form-label">Date de naissance</label>
                                    <input type="date" class="form-control" id="dateNaissance" name="date_nais">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="genre" class="form-label">Genre</label>
                                    <select class="form-select" id="genre" name="genre">
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
                                        <option value="Developpement Digitl">Developpement Digitl</option>
                                        <option value="Gestion des Entreprises">Gestion des Entreprises</option>
                                        <option value="Marketing Digital">Marketing Digital</option>
                                        <option value="Design">Design</option>
                                    </select>
                                </div>
                                
                            </div>


                            <div class="mb-4">
                                <label for="niveau" class="form-label">Niveau</label>
                                <select class="form-select" id="niveau" name="niveau">
                                    <option selected disabled>Choisir...</option>
                                    <option value="1">Niveau 1</option>
                                    <option value="2">Niveau 2</option>
                                    <option value="3">Niveau 3</option>
                                    <option value="4">Niveau 4</option>
                                    <option value="5">Niveau 5</option>
                                </select>
                            </div>


                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <button type="reset" class="btn btn-outline-secondary me-md-2">Annuler</button>
                                <button type="submit" class="btn btn-gold">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

</body>
</html>