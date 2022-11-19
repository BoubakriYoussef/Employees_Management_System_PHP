<?php 
require "database.php";
//require "Sécurité_AuthentificationAdm.php";
if(isset($_GET['matriculeSalarie']) AND !empty($_GET['matriculeSalarie'])){ //si l'id a bien récupéré
    $recupId=$_GET['matriculeSalarie'];
    $recupF = $cnx->prepare("SELECT * FROM salarie where matriculeSalarie = ?");  
    $recupF->execute(array($recupId));// récupe le plat de ce l'id
    if($recupF->rowcount()>0){ //récupéré l'id qui été rentré en paramétre dans l'url
        $supSalarie = $cnx->prepare("DELETE FROM salarie WHERE matriculeSalarie = ?");
        $supSalarie->execute(array($recupId));
        header("location:Salaries.php");
    } else{
        $erreur=" Aucun Salarie nn'a été trouvé";
    }
}
else{
    $erreur= "L'identifiant n'a pas été récupéré ";
}
?>