<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Matière - EduTrack</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        :root {
            --bleu-profond: #003973;
            --accent-or: #d4af37;
            --accent-or-hover: #e8c766;
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

        .form-container {
            background-color: #ffffffee;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 500px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: var(--bleu-profond);
        }

        .form-label {
            font-weight: 600;
            color: var(--bleu-profond);
        }

        .form-control:focus {
            border-color: var(--accent-or);
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
        }

        .btn-submit {
            background-color: var(--accent-or);
            border: none;
            width: 100%;
            padding: 10px;
            font-weight: bold;
            color: #fff;
        }

        .btn-submit:hover {
            background-color: var(--accent-or-hover);
        }
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
        </form>
    </div>

</body>
</html>
