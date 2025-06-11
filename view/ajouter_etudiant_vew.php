<?php
require_once __DIR__."/../modele/modele_filiere.php";
$res=Filiere::display()

?>

<html>
    <body>
        <form action="" method="post">
            <label for="nom">Nom Complete:</label>
            <input type="text" name="nom">

            <label for="email">Email</label>
            <input type="email" name="email">

            <label for="filier">Filiere</label>
            <select name="filier">
                <?php foreach($res as $f){
                    echo "<option value='{$f['id_filiere']}'>{$f['nom']}</option>";
                } ?>
            </select>
            <label for="niveau">Niveau</label>
            <select name="niveau">
                <option value="1">1er</option>
                <option value="2">2er</option>
            </select>

            <button type="submit">Inscrire</button>
        </form>
    </body>
</html>