<?php
require_once 'dbfinalhope.php';

session_start();
?>
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
</head>


<?php
$recupUser = $db->query("SELECT DISTINCT user_name,quiz_name,questions,answers FROM user JOIN quiz where user_name='Benchikhe Youssef'");
?>

<table  class="table table-striped table-bordered">
  <tr class="tr1">
    <th>User Name</th>
    <th>Quiz Name </th>
    <th>Questions </th>
    
    
   </tr>

   <?php
   while($User = $recupUser->fetch()) {//retourne les enregistrement de table client
       ?>
    
       <tr class="tr2">
       <td><?=($User['user_name'])?></td>
       <td><?=($User['quiz_name'])?></td>>
       <td><?=($User['questions'])?></td>
       
       
        </tr>
        
        <?php
    }
    ?>

<table  class="table table-striped table-bordered">
    <tr class="tr1">
    <th>Answers </th>
    <th>Action</th>
    </tr>
    
    <?php
    while($User = $recupUser->fetch()) {
    ?>

    <tr class="tr2">
    <td><?=($User['answers'])?></td>
    <td><button type="submit" class="btn btn-success" name="ajoutreponse">Valider Réponses</button></td>
    </tr>
    <?php
    }
    ?>



