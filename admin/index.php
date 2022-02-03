<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Auto Moreira - Administração</title>
	<link rel="icon" type="image/x-icon" href="../images/car.ico"/>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/fontawesome.min.css">
	<link rel="stylesheet" href="css/auto.css">
	<style>

		body{
			background-image: url(images/back3.jpg);
			background-repeat: no-repeat;
			background-size: cover;
			
		}

	</style>
</head>
<body>
<?php 
require 'includes/connection.php';
?> 

<div class="container-fluid">
	<h1 class="text-center text-white px-5 py-5" style="font-weight: bold;">Auto Moreira - Administração</h1>
</div>


<!-- Botão Voltar -->
<div class="container mt-2">
  <div class="d-flex justify-content-start justify-content-lg-end mt-4">
    <a href="../index.php" class="btn btn-dark btn-lg" role="button" aria-pressed="true">logout&nbsp;<i class="fas fa-sign-out-alt"></i></a>
  </div>
</div>

<div class="container mt-5 back">
	<div class="d-flex justify-content-around py-5">
		<a class="card px-4 text-dark" href="messageAdmin.php">
			<i class="far fa-envelope fa-9x"></i>
		</a>
		<a class="card px-4 text-dark" href="autoAdmin.php">
			<i class="fas fa-car fa-9x"></i>
		</a>
		
	</div>
	
</div>



<script src="js/bootstrap.bundle.min.js"></script>
<script>

</script>
</body>
</html>