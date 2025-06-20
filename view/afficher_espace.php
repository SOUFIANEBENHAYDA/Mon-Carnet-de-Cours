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
  <link rel="stylesheet" href="../css/index4.css">
  <style>
    
  </style>
</head>
<body>
    <div class="container-collab">
        <div class="text-end mb-3">
            <a href="../view/delete_forum_all.php" class="btn btn-danger" onclick="return confirm('⚠️ Êtes-vous sûr de vouloir supprimer tous les messages ?');">
            🗑️ Supprimer Tous
            </a>
    </div>
        <h2>📬 Espace Collaboratif - Admin</h2>
        <?php if(!empty($res)): ?>
        <?php foreach ($res as $post): ?>
            <div class="message-card">
            <div class="message-header">
                <h5>
                <?= $post['nom_etud']?>
                <small class="text-muted">• <?= $post['email'] ?></small>
                </h5>
                <div class="action-buttons">
                <i class="fas fa-reply" title="Répondre"></i>
                <a href="delete_forum.php?id=<?= $post['id_post'] ?>" class="fas fa-trash-alt" title="Supprimer"></a>
                </div>
            </div>
            <div class="message-body">
                <?= $post['contenu']?>
            </div>
            </div>
        <?php endforeach; ?>
        <?php else: ?>
            <script>alert('Aucun message trouvé !!');</script>
        <?php endif; ?>
  </div>

  <div class="retour">
    <a href="../view/acceuil_admin.php">Retour</a>
  </div>

  <script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>
