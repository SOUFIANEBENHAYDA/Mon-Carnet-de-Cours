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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin - Espace Collaboratif</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="../fontawesome-free-6.7.1-web/css/all.css" />
  <link rel="stylesheet" href="../css/index16.css">
  <style>
    
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
