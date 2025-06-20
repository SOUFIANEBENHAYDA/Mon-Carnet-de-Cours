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
  <link rel="stylesheet" href="../css/index7.css">
  <style>
    
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
