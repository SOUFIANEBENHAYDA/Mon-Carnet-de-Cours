<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin - Espace Collaboratif</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="../fontawesome-free-6.7.1-web/css/all.css" />
  <style>
    :root {
      --bleu: #003973;
      --beige: #f5f5ee;
      --or: #d4af37;
    }
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: url(../Images/background_admin.png);
      background-size: cover;
      background-position: center;
      margin: 0;
      padding: 20px;
      flex-direction: column;
    }
    .container-collab {
      background-color: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      max-width: 1000px;
      width: 100%;
      margin-bottom: 20px;
    }
    .container-collab h2 {
      text-align: center;
      color: var(--bleu);
      margin-bottom: 30px;
    }
    .message-card {
      border-left: 5px solid var(--or);
      margin-bottom: 20px;
      padding: 15px 20px;
      background-color: var(--beige);
      border-radius: 8px;
      transition: 0.3s;
    }
    .message-card:hover {
      background-color: #fdfdfd;
      transform: scale(1.01);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }
    .message-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
    }
    .message-header h5 {
      margin: 0;
      color: var(--bleu);
    }
    .message-body {
      color: #333;
      white-space: pre-wrap;
    }
    .action-buttons i {
      margin-left: 10px;
      cursor: pointer;
      color: var(--bleu);
      transition: color 0.3s;
    }
    .action-buttons i:hover {
      color: var(--or);
    }
    .retour {
      text-align: center;
      margin-top: 10px;
    }
    .retour a {
      color: var(--bleu);
      text-decoration: none;
      font-weight: 600;
      border: 2px solid var(--bleu);
      padding: 6px 12px;
      border-radius: 6px;
      transition: background-color 0.3s, color 0.3s;
    }
    .retour a:hover {
      background-color: var(--bleu);
      color: #fff;
    }

    .btn-ajouter {
      background-color: var(--or);
      color: #000;
      font-weight: bold;
      padding: 8px 16px;
      border: none;
      border-radius: 6px;
      transition: 0.3s ease;
      text-decoration: none;
    }

    .btn-ajouter:hover {
      background-color: #f1d26d;
      color: #000;
    }

    .ajout-container {
      text-align: right;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>

  <div class="container-collab">
    <div class="ajout-container">
      <a href="../view/lien_espace.php" class="btn-ajouter">
        ➕ Ajouter un message
      </a>
    </div>

    <h2>📬 Espace Collaboratif - Admin</h2>

    <?php if (!empty($res)): ?>
      <?php foreach ($res as $post): ?>
        <div class="message-card">
          <div class="message-header">
            <h5>
              <?= htmlspecialchars($post['nom_etud']) ?>
              <small class="text-muted">• <?= htmlspecialchars($post['email']) ?></small>
            </h5>
            <div class="action-buttons">
              <i class="fas fa-reply" title="Répondre"></i>
            </div>
          </div>
          <div class="message-body">
            <?= nl2br(htmlspecialchars($post['contenu'])) ?>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <script>alert('Aucun message trouvé !!');</script>
    <?php endif; ?>
  </div>

  <div class="retour">
    <a href="../view/acceuil_etudiants.php">Retour</a>
  </div>

  <script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>
