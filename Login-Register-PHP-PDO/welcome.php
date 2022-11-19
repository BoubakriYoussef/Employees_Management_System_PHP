<!-- Page bienvenue pour admin/gestion -->
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

.tr1{
  color:red;
}
.tr2{
  color:green;
}

.btn-btn-warning{
  position: relative;
  display: inline-flex;
  width: 80px;
  height: 55px;
  margin: 0 15px;
  perspective: 100px;
  font-size: 19px;
  letter-spacing: 1px;
  transform-style: preserve-3d;
  transform: translateZ(-25px);
  transition: transform .25s;
  font-family: 'Montserrat', sans-serif;
  position: absolute;
  content: "BUTTON";
  height: 25px;
  width: 100px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 5px solid black;
  box-sizing: border-box;
  border-radius: 5px;
  color: white;
  background: black;
  transform: rotateY(0deg) translateZ(25px);

}
#form1 {
  display: none;
}
.formulaire{
    display : none;
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
          <a class="navbar-brand" href="welcomeScreen.php">Nexans-Management</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
      </div>
    </nav>
	
	<div class="wrapper">
	<div class="container">
			
		<div class="col-lg-12">
			<center>
				<h2>

				<?php
				
				require_once 'connection.php';
        
				
				session_start();
        
        if(isset($_POST["ajoutEmploye"])){

         
          $email=htmlspecialchars($_POST["email"]);
         

          if(!empty($email) ){
              $reverifEmploye=$db->prepare("SELECT email FROM tbl_employe where 'email' = ?");
              $reverifEmploye->execute(array($email));
              if($reverifEmploye->rowCount()==0){
                  $reqInsertion="INSERT INTO tbl_employe (email) VALUES ($email)";
                   $db->query($reqInsertion);
                  $msg= "L'employé est bien ajouté";
              }else{
                  $erreur ="L'employé est déjà ajouté";
              }}
          else{
              $erreur="Veuillez remplir le champs";
          }
      }

				if(!isset($_SESSION['user_login']))	//check unauthorize user not access in "welcome.php" page
				{
					header("location: index.php");
				}
				
				$id = $_SESSION['user_login'];
				
				$select_stmt = $db->prepare("SELECT * FROM tbl_user WHERE user_id=:uid");
				$select_stmt->execute(array(":uid"=>$id));
	
				$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
				
				if(isset($_SESSION['user_login']))
				{
				?>
				<img src="img/administrateur.png" width="75px" height="74px" alt="">
				<?php
						echo $row['username'];
				}

        
				?>
					 Bienvenue dans l'éspace dédié à la gestion des salariés
					 <br><strong>Choisissez le champ convenable</strong>
				
				</h2>
					
					<a href="logout.php" class="btn btn-info btn-lg">
          				<span class="glyphicon glyphicon-log-out"></span> Se Déconnecter
        			</a>
			</center>
			
		</div>
		
	</div>	
	</div>
	<br>

	<?php
$recupEmploye = $db->query("SELECT * FROM tbl_employe");
?>
<br><br>
<center>


<table  class="table table-striped table-bordered"">
  <tr class="tr1">
    <th>identifiant</th>
    <th>Nom utilisateur </th>
    <th>Email </th>
    <th>Mot de passe </th>
    <th>matricule Employé </th>
    <th>Nom </th>
    <th>Prénom </th>
    <th>Statut  </th>
    <th>Date Naissance </th>
    <th>Téléphone </th>
    <th>Département </th>
    <th>Ville </th>
    <th>Modification </th>
    <th>Suppréssion </th>
   </tr>
  
   </center>
  <?php
while($Employe = $recupEmploye->fetch()) {//retourne les enregistrement de table client
    ?>
        <tr class="tr2">
       <td><?=($Employe['user_id'])?></td>
       <td><?=($Employe['username'])?></td>>
       <td><?=($Employe['email'])?></td>
       <td><?=($Employe['password'])?></td>
       <td><?=($Employe['matriculeEmploye'])?></td>
       <td><?=($Employe['nomEmploye'])?></td>
       <td><?=($Employe['prenomEmploye'])?></td>
       <td><?=($Employe['statutEmploye'])?></td>
       <td><?=($Employe['dateNaissance'])?></td>
       <td><?=($Employe['telephone'])?></td>
       <td><?=($Employe['departement'])?></td>
       <td><?=($Employe['ville'])?></td>
       <td><a href="modifierEmploye.php?user_id=<?= ($Employe['user_id'])?>" class="btn btn-warning" style="text_decoration: none;">Modifier</a></td>
       <td><a href="supprimerEmploye.php?user_id=<?= ($Employe['user_id'])?>" class="btn btn-warning" style="text_decoration: none;">Supprimer</a></td>
</tr>

    <?php
     }
     ?>

<!--Button to show add employee-->


<br><br>

<h3 align="center"><i>Ajouter un employé</i></h3>
    <table align="center">
        <form action="" method="post">
        <div class="mb-3">
        <tr>
            <td>
            <label  class="form-label"> Email  </label>
            </td>
            <td>
            <input type="text" class="form-control"  placeholder="Email" name="email">
            </td>
        </tr>
        <tr>
    <td>
    <button type="submit" class="btn btn-success" name="ajoutEmploye"> Ajouter </button>
</td>
<td>
<button type="reset" class="btn btn-secondary">Annuler</button>
    </td>
</tr>
        </form>
    </table>
<br> <br>



</body>
</html>