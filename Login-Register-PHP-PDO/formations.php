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
          <a class="navbar-brand" href="welcomeScreen.php">Nexans-Management</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
      </div>
    </nav>

    <a href="logout.php" class="btn btn-info btn-lg">
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

<?php 
 
if(isset($_POST["ajoutFormation"])){

    $idUtilisateur=($_POST["idUtilisateur"]);
    $nom=($_POST["nom"]);
    $prenom=($_POST["prenom"]);
    $nomFormation=($_POST["nomFormation"]);
    $date_debut=($_POST["date_debut"]);
    $date_fin=($_POST["date_fin"]);

    if(!empty($idUtilisateur) AND !empty($nom) AND !empty($prenom) AND !empty($nomFormation) AND !empty($date_debut) AND !empty($date_fin) ){
        $reverificationFormation=$conn->prepare("SELECT idUtilisateur,nom,prenom,nomFormation,date_debut,date_fin FROM formations where idUtilisateur = ? AND nom = ? AND prenom = ? AND nomFormation = ? AND date_debut = ? AND date_fin = ?");
        $reverificationFormation->execute(array($idUtilisateur,$nom,$prenom,$nomFormation,$date_debut,$date_fin));
        if($reverificationFormation->rowCount()==0){
            $reqInsertion="INSERT INTO formations VALUES ($idUtilisateur,$nom,$prenom,$nomFormation,$date_debut,$date_fin)";
             $conn->query($reqInsertion);
            $msg= "L'employé est bien ajouté";
        }else{
            $erreur ="L'employé est déjà ajouté";
        }}
    else{
        $erreur="Veuillez remplir le champs";
    }
}
?>



<div class="box">
  <div class="content">
    <h1>

    <h3 align="center"><i>Ajouter Une Formation</i></h3>
    <table align="center">
        <form action="" method="post">
            <div class="mb-3">
                <tr>
                    <td>
                         <label  class="form-label"> id Utilisateur  </label>
                    </td>
                    <td>
                    <input type="text" class="form-control"  placeholder="idUtilisateur" name="idUtilisateur">
                    
                    </td>
                </tr>
                <tr>
                    <td>
                         <label  class="form-label"> Nom  </label>
                    </td>
                    <td>
                    <input type="text" class="form-control"  placeholder="nom" name="nom">
                    
                    </td>
                </tr>
                <tr>
                    <td>
                         <label  class="form-label"> prenom  </label>
                    </td>
                    <td>
                        <input type="text" class="form-control"  placeholder="prenom" name="prenom">
                    </td>
                </tr>
                <tr>
                    <td>
                         <label  class="form-label"> nom Formation  </label>
                    </td>
                    <td>
                        <input type="text" class="form-control"  placeholder="nomFormation" name="nomFormation">
                    </td>
                </tr>
                <tr>
                    <td>
                         <label  class="form-label"> date début  </label>
                    </td>
                    <td>
                        <input type="date" class="form-control"  placeholder="date début " name="date_debut">
                    </td>
                </tr>
                <tr>
                    <td>
                         <label  class="form-label"> date fin  </label>
                    </td>
                    <td>
                        <input type="date" class="form-control"  placeholder="date-fin" name="date_fin">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-success" name="ajoutFormation"> Ajouter </button>
                    </td>
                    <td>
                        <button type="reset" class="btn btn-secondary">Annuler</button>
                    </td>
                </tr>


        </form>
    </table>
    </h1> 
  </div>
</div>
 
</body>
</html>