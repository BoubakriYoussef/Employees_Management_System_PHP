<!-- Déconnexion pour admin -->
<?php
session_start();

header("location:connexionAdmin.php");

session_destroy();

?>