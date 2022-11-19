<?php
require "connection.php";
if(isset($_GET['user_id']) AND !empty($_GET['user_id'])){

    $Id=$_GET['user_id'];
    $recupEmploye=$db->prepare("SELECT * FROM tbl_employe where user_id=?");
    $recupEmploye->execute(array($Id));
    if($recupEmploye->rowCount()>0){
        $infoEmploye=$recupEmploye->fetch();
        $infoIDEmploye=$infoEmploye['user_id'];
        $infoNomUtilisateurEmploye=$infoEmploye['username'];       
        $infoEmailEmploye=$infoEmploye['email'];       
        $infoMDPEmploye=$infoEmploye['password'];       
        $infoMatriculeEmploye=$infoEmploye['matriculeEmploye'];       
        $infoNomEmploye=$infoEmploye['nomEmploye'];
        $infoPrenomEmploye=$infoEmploye['prenomEmploye'];
        $infoStatutEmploye=$infoEmploye['statutEmploye'];
        $infoDateNaissanceEmploye=$infoEmploye['dateNaissance'];
        $infoTelephoneEmploye=$infoEmploye['telephone'];
        $infoDepartementEmploye=$infoEmploye['departement'];
        $infoVilleEmploye=$infoEmploye['ville'];  
    }
}

if(isset($_POST['modifyEmploye'])){
    $Id=$_POST['user_id'];
   $updateusername=htmlspecialchars($_POST['username']);  
   $updateEmail=htmlspecialchars($_POST['email']); 
   $updatePassword=htmlspecialchars($_POST['password']); 
   $updateMatricule=htmlspecialchars($_POST['matriculeEmploye']);  
   $updateNomEmploye=htmlspecialchars($_POST['nomEmploye']); 
   $updatePrenomEmploye=htmlspecialchars($_POST['prenomEmploye']);
   $updateStatutEmploye=htmlspecialchars($_POST['statutEmploye']);  
   $updateDateNaissance=htmlspecialchars($_POST['dateNaissance']); 
   $updateTelephone=htmlspecialchars($_POST['telephone']);
   $updateDepartement=htmlspecialchars($_POST['departement']);
   $updateVille=htmlspecialchars($_POST['ville']);
   $reqModifier=$db->prepare("UPDATE tbl_employe SET username = ?, email = ?, password= ?, matriculeEmploye = ?, nomEmploye = ?, prenomEmploye = ?, statutEmploye = ?, dateNaissance = ?, telephone= ?, departement = ?,ville = ?  WHERE user_id = ?");
    $reqModifier->execute(array($updateusername,$updateEmail,$updatePassword, $updateMatricule,$updateNomEmploye, $updatePrenomEmploye, $updateStatutEmploye,$updateDateNaissance, $updateTelephone, $updateDepartement,$updateVille, $Id));
  header("location:welcome.php?user_id=".$Id);
}
?>

<!-- Page welcome de l'employé/quiz  -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Nexans-Management</title>
		
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Css -->
<style>
	.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  background-color: #2196F3;
  padding: 10px;
  
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  font-size: 20px;
  text-align: center;
}



p {
  line-height: 1.4;
}

a {
  outline: none;
  text-decoration: none;
  padding: 2px 1px 0;
}

a:link {
  color: #265301;
}

a:visited {
  color: #437A16;
}

a:focus {
  border-bottom: 1px solid;
  background: #BAE498;
}

a:hover {
  border-bottom: 1px solid;
  background: #CDFEAA;
}

a:active {
  background: #265301;
  color: #CDFEAA;
}
</style>
		
</head>

<body>
<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Nexans-Management</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
      </div>
    </nav>
    <table align="center">
        <form action="" method="post">
        <div class="mb-3">
        <tr>
           
            <td>
            <input type="text" class="form-control"  placeholder="Nom d'utilisateur" name="username" value ="<?= $infoNomUtilisateurEmploye ?>">
            <input type="text" class="form-control"  placeholder="Email" name="email" value ="<?= $infoEmailEmploye ?>">
            <input type="text" class="form-control"  placeholder="Mot de passe" name="password" value ="<?= $infoMDPEmploye ?>">
            <input type="text" class="form-control"  placeholder="Matricule Employé" name="matriculeEmploye" value ="<?= $infoMatriculeEmploye ?>">
            <input type="text" class="form-control"  placeholder="Nom " name="nomEmploye" value ="<?= $infoNomEmploye ?>">
            <input type="text" class="form-control"  placeholder="Prenom" name="prenomEmploye" value ="<?= $infoPrenomEmploye ?>">
            <input type="text" class="form-control"  placeholder="Statut" name="statutEmploye" value ="<?= $infoStatutEmploye ?>">
            <input type="text" class="form-control"  placeholder="Date Naissance" name="dateNaissance" value ="<?= $infoDateNaissanceEmploye ?>">
            <input type="text" class="form-control"  placeholder="Telephone" name="telephone" value ="<?= $infoTelephoneEmploye ?>">
            <input type="text" class="form-control"  placeholder="Departement" name="departement" value ="<?= $infoDepartementEmploye ?>">
            <input type="text" class="form-control"  placeholder="Ville" name="ville" value ="<?= $infoVilleEmploye ?>">
            <input type="hidden" name="user_id" value="<?= $Id ?>">


            </td>
        </tr>
</div>
<tr>
    <td>
    <button type="submit" class="btn btn-warning" name="modifyEmploye">Valider</button>
</td>
<td>
<button type="reset" class="btn btn-secondary">Annuler</button>
    </td>
</tr>
        </form>
    </table>

