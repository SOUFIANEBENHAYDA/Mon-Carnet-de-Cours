<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Espace Collaboratif</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../fontawesome-free-6.7.1-web/css/all.css">
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
    }

    .container-collab {
      background-color: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      max-width: 1000px;
      width: 100%;
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
  </style>
</head>
<body>
    <div class="container-collab">
        <h2>📬 Espace Collaboratif - Admin</h2>
        <div class="message-card">
        <div class="message-header">
            <h5>ccc <small class="text-muted">• AAAAAAAAAAAAAA@email.com</small></h5>
            <div class="action-buttons">
            <i class="fas fa-reply" title="Répondre"></i>
            <i class="fas fa-trash-alt" title="Supprimer"></i>
            </div>
        </div>
        <div class="message-body">
            Bonjour, XXXXXXXXXXXXXXXXXXXX
        </div>
        </div>

        <div class="message-card">
        <div class="message-header">
            <h5>pp <small class="text-muted"></small></h5>
            <div class="action-buttons">
            <i class="fas fa-reply" title="Répondre"></i>
            <i class="fas fa-trash-alt" title="Supprimer"></i>
            </div>
        </div>
        <div class="message-body">
            
        </div>
        </div>

        <div class="message-card">
        <div class="message-header">
            <h5>lll <small class="text-muted">• @email.com</small></h5>
            <div class="action-buttons">
            <i class="fas fa-reply" title="Répondre"></i>
            <i class="fas fa-trash-alt" title="Supprimer"></i>
            </div>
        </div>
        <div class="message-body">
            Sorry.
        </div>
        </div>

    </div>

    <script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>
