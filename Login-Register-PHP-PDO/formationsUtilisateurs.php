<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Formations et Réponses</title>
    		
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/cadre.css">    
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
    <!-- Navigation barre-->
	<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="welcome2.php">Nexans-Management</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
      </div>
    </nav>

    <a href="logout2.php" class="btn btn-info btn-lg">
          				<span class="glyphicon glyphicon-log-out"></span> Se Déconnecter
        			</a>
	
   
    
  
    <?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "formations";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT idUtilisateur,nom,prenom,nomFormation,date_debut,date_fin FROM utilisateur JOIN formation
    ON utilisateur.idUtilisateur = formation.utilisateur_id";

    $result = mysqli_query($conn, $sql);
    
    
    ?>

    <?php 
    $recupererFormations = $conn->query("SELECT idUtilisateur,nom,prenom,nomFormation,date_debut,date_fin FROM utilisateur JOIN formation
    ON utilisateur.idUtilisateur = formation.utilisateur_id");
    ?>


    <table  class="table table-striped table-bordered"">
            <tr class="tr1">
            <th>identifiant Utilisateur</th>
            <th>Nom  </th>
            <th>Prenom </th>
            <th>Nom Formation </th>
            <th>date début</th>
            <th>date fin </th>
            
            </tr>

    <?php
    while($Formations = $recupererFormations->FETCH_ASSOC()) {//retourne les enregistrement de table client
    ?>

<tr class="tr2">
       <td><?=($Formations['idUtilisateur'])?></td>
       <td><?=($Formations['nom'])?></td>
       <td><?=($Formations['prenom'])?></td>
       <td><?=($Formations['nomFormation'])?></td>
       <td><?=($Formations['date_debut'])?></td>
       <td><?=($Formations['date_fin'])?></td>
</tr>
    <?php
     }
     ?>  
      
</body>
</html>