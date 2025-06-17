<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Bienvenue sur EduTrack</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --bleu-fonce: #003973;
      --or: #d4af37;
      --blanc: #ffffff;
      --noir: #000;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                  url('Marrakech.jpg') no-repeat center center fixed;
      background-size: cover;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      background-color: rgba(255, 255, 255, 0.95);
      padding: 50px 40px;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      text-align: center;
      max-width: 400px;
      width: 90%;
    }

    .container h1 {
      color: var(--bleu-fonce);
      font-size: 32px;
      margin-bottom: 30px;
      font-weight: 600;
    }

    .btn {
      display: block;
      width: 100%;
      padding: 14px;
      margin: 15px 0;
      font-size: 18px;
      font-weight: 600;
      color: var(--blanc);
      background-color: var(--bleu-fonce);
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .btn::after {
      content: "";
      position: absolute;
      background: var(--or);
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      transition: all 0.4s ease;
      z-index: 0;
    }

    .btn:hover::after {
      left: 0;
    }

    .btn span {
      position: relative;
      z-index: 1;
    }

    .btn:hover span {
      color: var(--noir);
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    @media (max-width: 500px) {
      .container {
        padding: 30px 20px;
      }

      .container h1 {
        font-size: 26px;
      }

      .btn {
        font-size: 16px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Bienvenue sur <span style="color: var(--or);">EduTrack</span></h1>
    <a href="view/connexion_admin1.php">
      <button class="btn"><span>Connexion Admin</span></button>
    </a>
    <a href="view/connexion_etudiant.php">
      <button class="btn"><span>Connexion Étudiant</span></button>
    </a>
  </div>
</body>
</html>
