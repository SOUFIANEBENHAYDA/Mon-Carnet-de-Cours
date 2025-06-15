<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin - Gestion des Notes</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="../fontawesome-free-6.7.1-web/css/all.css"/>

  <style>
    :root {
      --bleu: #0056b3;         
      --beige: #f8f9fa;         
      --or: #d4af37;
      --hover-bg: #e2e6ea;      
      --text-color: #212529;    
      --btn-bg: #e9ecef;        
      --btn-hover-bg: #ced4da;  
    }

    body {
      background: var(--beige);
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 40px 20px;
      color: var(--text-color);
    }

    .container-notes {
      max-width: 1100px;
      margin: auto;
      background-color: white;
      padding: 40px;
      border-radius: 18px;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.05);
    }

    .container-notes h2 {
      text-align: center;
      color: var(--bleu);
      margin-bottom: 30px;
    }

    .btn-ajouter {
      background-color: var(--or);
      color: #000;
      border: none;
      font-weight: bold;
      transition: background-color 0.3s ease;
      padding: 10px 20px;
    }

    .btn-ajouter:hover {
      background-color: #e8c766;
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 12px;
      font-size: 1rem;
    }

    thead tr {
      background-color: var(--bleu);
      color: white;
      border-radius: 10px;
    }

    th, td {
      text-align: center;
      padding: 14px 16px;
      vertical-align: middle;
    }

    tbody tr {
      background-color: var(--beige);
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
      border-radius: 10px;
    }

    tbody tr:hover {
      background-color: var(--hover-bg);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    button {
      background-color: var(--btn-bg);
      border: 1px solid #adb5bd;
      color: var(--bleu);
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    button:hover {
      background-color: var(--btn-hover-bg);
      color: var(--bleu);
      border-color: var(--bleu);
    }

    button i {
      font-size: 16px;
    }

    .btn-outline-warning:hover {
      background-color: #ffc107;
      color: white;
      border-color: #ffc107;
    }

    .btn-outline-danger:hover {
      background-color: #dc3545;
      color: white;
      border-color: #dc3545;
    }

    @media (max-width: 768px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }

      thead {
        display: none;
      }

      td {
        padding: 12px;
        text-align: left;
        position: relative;
        padding-left: 50%;
        border-bottom: 1px solid #ccc;
      }

      td::before {
        position: absolute;
        top: 12px;
        left: 16px;
        width: 45%;
        padding-right: 10px;
        white-space: nowrap;
        font-weight: bold;
        color: var(--bleu);
      }

      td:nth-child(1)::before { content: "#"; }
      td:nth-child(2)::before { content: "Étudiant"; }
      td:nth-child(3)::before { content: "Matière"; }
      td:nth-child(4)::before { content: "Note"; }
      td:nth-child(5)::before { content: "Action"; }
    }
    a{
        text-decoration: none;
    }
  </style>
</head>
<body>

  <div class="container-notes">
    <h2>🧾 Gestion des Notes - Admin</h2>

    <div class="d-flex justify-content-end mb-4">
      <button class="btn btn-ajouter"> <a href="../view/ajt_note.php">+ Ajouter une note</a></button>
    </div>

    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Étudiant</th>
          <th>Matière</th>
          <th>type de note</th>
          <th>Note</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Mariama</td>
          <td>EFM</td>
          <td>Mathématiques</td>
          <td>18.5</td>
          <td>
            <button class="btn btn-sm btn-outline-warning me-2" title="Modifier">
              <i class="fas fa-pen"></i>
            </button>
            <button class="btn btn-sm btn-outline-danger" title="Supprimer">
              <i class="fas fa-trash-alt"></i>
            </button>
          </td>
        </tr>
        <?php 
        //had l3iba tani hhhhhh
        require_once "../controller/connexions.php";
        $res=Note::note_etud_display();
        foreach($res as $r){
          echo'
          <tr>
          <td>'.$r["ide"].'</td>
          <td>'.$r["nom_etud"].'</td>
          <td>'.$r["matiere"].'</td>
          <td>'.$r["type_note"].'</td>
          <td>'.$r["note"].'</td>
          <td>
          <button class="btn btn-sm btn-outline-warning me-2" title="Modifier">
          <a href="edit_note.php?id='.$r["idn"].'&nom_etud='.$r["nom_etud"].'&matiere='.$r["matiere"].'&type='.$r["type_note"].'&note='.$r["note"].'" class="fas fa-pen"></a>
          </button>
          <button class="btn btn-sm btn-outline-danger" title="Supprimer">
          <a href="delete_note.php?id='.$r["idn"].'" class="fas fa-trash-alt"></a>
          </button>
          </td>
          </tr>';
          }
        ?>
      </tbody>
    </table>
    <a href="../view/acceuil_admin.php" class="btn btn-dark">Go back to acceuil_admin</a>
  </div>

  <script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>
