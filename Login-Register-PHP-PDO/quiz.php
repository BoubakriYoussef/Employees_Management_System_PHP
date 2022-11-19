<?php

session_start();

if (isset($_SESSION['user'])) {
  // logged in
} else {
  // not logged in
}


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
?>

<?php 
    $recupererQuiz = $conn->query("SELECT * FROM quiz WHERE user_id='?'");
?>


<table  class="table table-striped table-bordered"">
            <tr class="tr1">
            <th>user_id</th>
            <th>quiz_name </th>
            <th>questions </th>
            <th>Answers </th>
            </tr>

<?php
    while($Quiz = $recupererQuiz->FETCH_ASSOC()) {//retourne les enregistrement de table client
?>

<tr class="tr2">
       <td><?=($Quiz['user_id'])?></td>
       <td><?=($Quiz['quiz_name'])?></td>
       <td><?=($Quiz['questions'])?></td>
       <td><?=($Quiz['answers'])?></td>
       
</tr>
<?php
     }
?>  