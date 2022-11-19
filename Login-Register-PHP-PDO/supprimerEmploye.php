<?php 
require "connection.php";

if(isset($_GET['user_id']) AND !empty($_GET['user_id'])){ //si l'id a bien récupéré
    $Id=$_GET['user_id'];
    $recupEmploye = $db->prepare("SELECT * FROM tbl_employe where user_id = ?");  
    $recupEmploye->execute(array($Id));
    if($recupEmploye->rowcount()>0){ //récupéré l'id qui été rentré en paramétre dans l'url
        $supEmploye = $db->prepare("DELETE FROM tbl_employe WHERE user_id = ?");
        $supEmploye->execute(array($Id));
        header("location:welcome.php");
    } else{
        $erreur=" Aucun Employe n'a été trouvé";
    }
}
else{
    $erreur= "L'identifiant n'a pas été récupéré ";
}
?>

