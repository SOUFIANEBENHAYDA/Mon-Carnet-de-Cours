<html>
    <body>
        <form action="ajouter_emploi.php" method="post">
            <label>La Filière pour emploi:</label>
            <select name="filiere">
                <?php foreach($res as $r){echo '<option value="'.$r["id_filiere"].'">'.$r["nom"].'</option>';} ?>
            </select>

            <label>Niveau :</label>
            <select name="niveau">
                <option value="1">Première niveau</option>
                <option value="2">Deuxième niveau</option>
            </select>

            <table>
                <tr><td></td><td>8:30-11:00</td><td>11:00-13:30</td><td>13:30-16:00</td><td>16:00-18:30</td></tr>
                <tr><td>Lundi</td><td><input type="text" name="lun1"></td><td><input type="text" name="lun2"></td><td><input type="text" name="lun3"></td><td><input type="text" name="lun4"></td></tr>
                <tr><td>Mardi</td><td><input type="text" name="mar1"></td><td><input type="text" name="mar2"></td><td><input type="text" name="mar3"></td><td><input type="text" name="mar4"></td></tr>
                <tr><td>Mercredi</td><td><input type="text" name="mer1"></td><td><input type="text" name="mer2"></td><td><input type="text" name="mer3"></td><td><input type="text" name="mer4"></td></tr>
                <tr><td>Jeudi</td><td><input type="text" name="jeu1"></td><td><input type="text" name="jeu2"></td><td><input type="text" name="jeu3"></td><td><input type="text" name="jeu4"></td></tr>
                <tr><td>Vendredi</td><td><input type="text" name="ven1"></td><td><input type="text" name="ven2"></td><td><input type="text" name="ven3"></td><td><input type="text" name="ven4"></td></tr>
                <tr><td>Samedi</td><td><input type="text" name="sam1"></td><td><input type="text" name="sam2"></td><td><input type="text" name="sam3"></td><td><input type="text" name="sam4"></td></tr>
            </table>

            <button type="submit">Envoyer</button>
        </form>
    </body>
</html>
