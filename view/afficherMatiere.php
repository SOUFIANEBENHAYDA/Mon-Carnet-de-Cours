<?php

foreach($res as $ligne){
    echo $ligne['id_matiere'] ." ";
    echo $ligne['nom_prof'] ." ";
    echo $ligne['nom'] ." ";
    echo $ligne['coefficient'] ." ";
    echo "<br>";
}



?>