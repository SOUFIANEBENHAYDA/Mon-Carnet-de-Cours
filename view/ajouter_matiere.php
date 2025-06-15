<!DOCTYPE html>
<?php
require_once "../controller/connexions.php";
$res =display_prof();
?>
<html>
    <body>
        <form action="" method="post">
            <label for="nom">nom de matiere</label>
            <input type="text" name="nom"><br>

            <label for="ceof">Ceoficiant: </label>
            <input type="text" name="ceof"><br>

            <label for="idp">Prof responsable: </label>
            <select name="idp">
                <option value="0" disabled>choisir un prof...</option>
                <?php foreach($res as $r){
                    echo "<option value='{$r['id_prof']}'>{$r['nom']}</option>";
                }; ?>
            </select>

            <button type="submit" >Ajouter</button>
        </form>
    </body>
</html>