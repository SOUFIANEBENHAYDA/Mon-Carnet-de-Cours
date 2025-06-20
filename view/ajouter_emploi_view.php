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
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Ajout Emploi du Temps</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 0;
      background: #e0f7fa;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    form {
      background: #ffffff;
      border-radius: 15px;
      padding: 40px;
      width: 95%;
      max-width: 900px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #00796b;
    }

    label {
      font-weight: 600;
      display: block;
      margin: 15px 0 5px;
      color: #004d40;
    }

    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 8px;
      border: 1px solid #b2dfdb;
      background-color: #f1fdfd;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #b2ebf2;
      padding: 10px;
      text-align: center;
    }

    th {
      background-color: #00bcd4;
      color: white;
    }

    td:first-child {
      font-weight: 600;
      background-color: #b2dfdb;
    }

    input[type="text"] {
      width: 100%;
      padding: 8px;
      border-radius: 5px;
      border: 1px solid #b2dfdb;
      background-color: #e0f2f1;
    }

    button {
      margin-top: 25px;
      width: 100%;
      padding: 12px;
      background-color: #00796b;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background-color: #004d40;
    }

    @media (max-width: 600px) {
      table {
        font-size: 12px;
      }
      input[type="text"] {
        font-size: 12px;
      }
    }
  </style>
</head>
<body>

  <form action="ajouter_emploi.php" method="post">
    <h2>Ajouter un emploi du temps</h2>

    <label>Filière :</label>
    <select name="filiere">
      <?php foreach($res as $r){ echo '<option value="'.$r["id_filiere"].'">'.$r["nom"].'</option>'; } ?>
    </select>

    <label>Niveau :</label>
    <select name="niveau">
      <option value="1">Première niveau</option>
      <option value="2">Deuxième niveau</option>
    </select>

    <table>
      <tr>
        <th></th>
        <th>8:30 - 11:00</th>
        <th>11:00 - 13:30</th>
        <th>13:30 - 16:00</th>
        <th>16:00 - 18:30</th>
      </tr>
      <?php 
        $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
        foreach($jours as $jour){
          echo "<tr><td>$jour</td>";
          for($i=1;$i<=4;$i++){
            echo '<td><input type="text" name="'.strtolower(substr($jour,0,3)).$i.'" placeholder="Cours"></td>';
          }
          echo "</tr>";
        }
      ?>
    </table>

    <button type="submit">Enregistrer l'emploi du temps</button>
  </form>

</body>
</html>
