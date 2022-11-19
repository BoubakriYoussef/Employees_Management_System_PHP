<!-- Déconnexion pour employé -->
<?php
session_start();

header("location:connexionEmploye.php");

session_destroy();

?>