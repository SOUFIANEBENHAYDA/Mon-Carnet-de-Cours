<?php
//var_dump($res);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Documents</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../fontawesome-free-6.7.1-web/css/all.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url(../Images/background_admin.png) no-repeat center center fixed;
            background-size: cover;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 900px;
        }

        h2 {
            color: #003973;
            margin-bottom: 25px;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #003973;
            border: none;
        }

        .btn-primary:hover {
            background-color: #00509e;
        }

        .table th {
            background-color: #003973;
            color: white;
        }

        .btn-sm {
            margin: 0 2px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="text-center">Liste des Documents</h2>
        <div class="d-flex justify-content-between mb-3">
            <a href="../view/acceuil_admin.php" class="btn btn-dark">Retour</a>
            <a href="../view/ajouter_document.php" class="btn btn-primary">Ajouter un document</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID Matière</th>
                    <th>Titre</th>
                    <th>Télécharger</th>
                    <th>Lire</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($res as $r){
                    echo '
                    <tr>
                        <td>' . $r["id_matiere"] . '</td>
                        <td>' . $r["titre"] . '</td>
                        <td><a class="btn btn-success btn-sm" href="' . $r["fichier"] . '" download="cours_' . $r["titre"] . '.pdf">Télécharger</a></td>
                        <td><a class="btn btn-info btn-sm" href="' . $r["fichier"] . '" target="_blank">Lire</a></td>
                        <td><button class="btn btn-sm btn-outline-danger btn-action" title="Supprimer"><a href="delete_docs.php?id=' . $r["id_matiere"] . '" class="fas fa-trash-alt"></a></button></td></td>
                    </tr>';
                    //maybe the id of get
                    
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
