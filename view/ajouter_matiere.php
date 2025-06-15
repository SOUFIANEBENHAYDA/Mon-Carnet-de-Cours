<!DOCTYPE html>

<html>
    <body>
        <form action="../view/trait_matiere.php" method="post">
            <label for="nom">nom de matiere</label>
            <input type="text" name="nom"><br>

            <label for="ceof">Ceoficiant: </label>
            <input type="text" name="coef"><br>

            <label for="idp">Prof responsable: </label>
            <select name="idp">
                <option value="0" disabled>choisir un prof...</option>
                <?php foreach($result as $r){
                    echo "<option value='{$r['id_prof']}'>{$r['nom']}</option>";
                }; ?>
            </select>

            <button type="submit" >Ajouter</button>
        </form>
    </body>
</html>