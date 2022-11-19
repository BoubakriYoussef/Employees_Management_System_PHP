<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formations Internes et Externes</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/buttons.css">
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

<a href="formations.php">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Formations
    </a>
    <a href="welcome.php">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Utilisateurs
    </a>


    <a href="logout.php">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Se Déconnecter
    </a>
</body>
</html>