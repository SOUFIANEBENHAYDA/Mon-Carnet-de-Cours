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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Liste des Étudiants</title>
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
      align-items: flex-start;
      min-height: 100vh;
      background: url('background_admin.png') no-repeat center center;
      background-size: cover;
      margin: 0;
      padding: 40px 20px;
    }

    .container-etudiants {
      background-color: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      max-width: 1200px;
      width: 100%;
    }

    .container-etudiants h2 {
      text-align: center;
      color: var(--bleu);
      margin-bottom: 30px;
    }

    .btn-ajouter {
      background-color: var(--or);
      color: #000;
      font-weight: bold;
    }

    .btn-ajouter:hover {
      background-color: #e8c766;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    thead tr {
      background-color: var(--bleu);
      color: white;
    }

    th, td {
      text-align: center;
      padding: 12px 14px;
      border-bottom: 1px solid #ddd;
    }

    tbody tr:hover {
      background-color: #f9f9f9;
    }

    .btn-action i {
      margin: 0 4px;
    }

    @media (max-width: 768px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }

      thead {
        display: none;
      }

      td {
        text-align: left;
        padding-left: 50%;
        position: relative;
        border-bottom: 1px solid #ccc;
      }

      td::before {
        content: attr(data-label);
        position: absolute;
        left: 16px;
        font-weight: bold;
        color: var(--bleu);
      }
    }
  </style>
</head>
<body>

  <div class="container-etudiants">
    <h2>🎓 Liste des Étudiants</h2>

    <div class="d-flex justify-content-between mb-3">
      <a href="../view/acceuil_admin.php" class="btn btn-secondary">← Retour</a>
      <a class="btn btn-ajouter" href="../view/ajouter_etudiant.php">+ Ajouter un étudiant</a>
    </div>

    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Nom complet</th>
          <th>Email</th>
          <th>Téléphone</th>
          <th>Genre</th>
          <th>Date de Naissance</th>
          <th>Niveau</th>
          <th>Filière</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td data-label="#">1</td>
          <td data-label="Nom complet">www</td>
          <td data-label="Email">www@email.com</td>
          <td data-label="Téléphone">02020202</td>
          <td data-label="Genre">M</td>
          <td data-label="Date de Naissance">2020-04-06</td>
          <td data-label="Niveau">1ère</td>
          <td data-label="Filière">Dev</td>
          <td data-label="Actions">
            <button class="btn btn-sm btn-outline-warning btn-action" title="Modifier">
              <i class="fas fa-pen"></i>
            </button>
            <button class="btn btn-sm btn-outline-danger btn-action" title="Supprimer">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>
