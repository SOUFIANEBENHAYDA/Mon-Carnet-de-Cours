<!DOCTYPE html>
<html>
    <body>
        <form action="./ajouter_document.php" method="post" enctype="multipart/form-data">
            <label for="titre">Titre de document</label>    
            <input type="text" name="titre" required>

            <label for="fichier">ajouter fichier</label>
            <input type="file" name="fichier" accept="application/pdf" required>

            <label for="id_matiere">Matiere</label>
            <select name="id_matiere">
                <option value="" disabled>choisir une matiere</option>
                <?php 
                foreach ($res as $r){
                    echo "
                    <option value='".$r['id_matiere']."'>".$r['nom']."</option>
                    ";
                }
                ?>
            </select>
            <button type="submit">Ajouter</button>
        </form>
    </body>
</html>