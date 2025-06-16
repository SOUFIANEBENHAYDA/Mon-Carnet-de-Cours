<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <title>Espace Collaboratif</title>
    <style>
        :root {
            --bleu-profond: #003973;
            --bleu-profond-clair: #1a4d8c;
            --beige-clair: #f5f5ee;
            --beige-fonce: #e8e8e0;
            --accent-or: #d4af37;
            --accent-or-hover: #e8c766;
            --gris: #6c757d;
            --gris-clair: #f8f9fa;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url(../Images/background_admin.png);
            background-size: cover;
            background-position: center;
        }

        .container {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        b {
            font-size: 28px;
            color: var(--bleu-profond);
            display: block;
            margin-bottom: 25px;
            font-weight: 600;
            text-align: center;
        }

        textarea {
            height: 150px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
            resize: none;
        }

        textarea:focus,
        input:focus {
            border-color: var(--accent-or);
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.2);
            outline: none;
        }

        input,
        textarea {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            border: 1px solid #e0e0e0;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--accent-or);
            border: none;
            padding: 10px 25px;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            width: 150px;
        }

        .btn-primary:hover {
            background-color: var(--accent-or-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(212, 175, 55, 0.3);
        }

        .btn-secondary {
            background-color: var(--gris);
            border: none;
            padding: 10px 25px;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            color: white;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            width: 150px;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            margin-bottom: 20px;
        }

        .form-control::placeholder {
            color: var(--gris);
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <b>Espace Collaboratif</b>
        <form action="../view/trait_espace.php" method="post">
            <input type="text" placeholder="Name" class="form-control" name="nom" required>
            <input type="email" placeholder="Email" class="form-control" name="email" required>
            <textarea class="form-control" placeholder="Message" name="contenu" required></textarea>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">SEND</button>
                <a href="../view/acceuil_etudiants.php" class="btn btn-secondary">Retour</a>
            </div>
        </form>
    </div>
</body>
</html>
