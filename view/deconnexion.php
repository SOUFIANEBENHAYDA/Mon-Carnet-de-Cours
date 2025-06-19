<?php
session_start();
unset($_SESSION["user"]);
session_destroy();
header("Location: ../view/connexion_etudiant.php");
exit();
?>