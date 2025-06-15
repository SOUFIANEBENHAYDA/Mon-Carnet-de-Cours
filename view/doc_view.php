<?php
//var_dump($res);
?>
<html>
    <body>
        <a href="../view/ajouter_document.php">Ajouter document</a>
        <table>
            <?php
            foreach($res as $r){
                echo '<tr><td>'.$r["id_matiere"].'</td><td>'.$r["titre"].'</td><td><a href="'.$r["fichier"].'" download="cours'.$r["titre"].'.pdf">Telecharger le fichier</a></td><td><a href="'.$r["fichier"].'">lire le fichier</a></td><td></td></tr>';
                }
            ?>
        </table>
        
    </body>
</html>