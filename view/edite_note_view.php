<?php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Note - EduTrack</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        :root {
            --bleu-profond: #003973;
            --beige-clair: #f5f5ee;
            --accent-or: #d4af37;
            --accent-or-hover: #e8c766;
            --gris: #6c757d;
        }

        body{
        display: flex;
        justify-content: center;
        align-items: center;
        justify-self: center;
        min-height: 100vh;
        background: url(../Images/background_admin.png);
        background-size: cover;
        background-position: center;
        width: 600px;

        }

        .form-card {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 600px;
        }

        .section-header h3 {
            text-align: center;
            color: var(--bleu-profond);
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 600;
            color: var(--bleu-profond);
        }

        .btn-success {
            background-color: var(--accent-or);
            border: none;
            width: 100%;
            padding: 10px;
        }

        .btn-success:hover {
            background-color: var(--accent-or-hover);
        }

        .form-control:focus {
            border-color: var(--accent-or);
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
        }
    </style>
</head>
<body>

    <div class="form-card">
        <div class="section-header">
            <h3>Ajouter une Note</h3>
        </div>

        <form action="../view/trait_edite_info.php" method="post">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom d'Étudiant</label>
                <input type="text" name="nom" id="nom" value="<?php echo $_GET['nom_etud'] ?>" placeholder="Nom" class="form-control" required>
                
            </div>
            
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <div class="mb-3">
                <label for="matiere" class="form-label">Matière</label>
                <select id="matiere" name="matiere" class="form-control"  required>
                    
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
                    <option value="<?php echo $_GET['type'] ?>" selected><?php echo $_GET['type'] ?></option>
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
                <input type="number" id="note" name="note" class="form-control" min="0" max="20" step="0.5" value="<?php echo $_GET['note'] ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Enregistrer la note</button>
        </form>
        <a href="../view/acceuil_admin.php" class="btn btn-dark">Go back to acceuil_admin</a>
    </div>

</body>
</html>
