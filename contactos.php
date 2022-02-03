<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Auto Moreira</title>
  <link rel="icon" type="image/x-icon" href="images/car.ico"/>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/fontawesome.min.css">
  <link rel="stylesheet" href="css/auto.css">
</head>
<style>

	.map-container{
		overflow:hidden;
		padding-bottom:56.25%;
		position:relative;
		height:0;
	}
	.map-container iframe{
		left:0;
		top:0;
		height:100%;
		width:100%;
		position:absolute;
	}
  
  #btn-s{
    width: 100%;
  
  }

  #btn-s:hover{
    opacity: 0.8;
  }
  
    
</style>
<body>


<!-- Menu Principal -->
<?php 
$currentPage = 'contactos'; 
require 'includes/menu.php';
?> 

<?php

require 'includes/connection.php'; 
$message = '';


    if( isset($_GET['insert']) ) {
      $insert = $_GET['insert'];
      if ($insert == 1) {
        $message = 'Mensagem enviada com sucesso!';
      }else{
        $message = 'Mensagem não enviada!';
      }  
    }
?>




<div class="container mt-5 mb-5">
  <div class="row">
    <div class="col">
      
        <!--Google map-->
        <div id="" class="map-container">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d689.7943534316843!2d-8.789697870780593!3d40.45566559871007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd23b7791c61f11d%3A0x32922cc393d10a26!2sAutoMore!5e1!3m2!1spt-PT!2spt!4v1607902514178!5m2!1spt-PT!2spt"
            frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      
     
    </div>
  </div>
</div>
      
<div class="container mb-5">
  <div class="row">
  <div class="col-12 col-xl-5 card">
    <div class="mt-5">
      <h1 class="text-center">Tem alguma sugestão?</h1>
      <h6 class="text-center">Fale Connosco e envie-nos a sua mensagem!</h6>
    </div>
    <div class="form-group">
          <?php if(!empty($message)): ?>
        <div class="alert alert-success mt-3">
          <?= $message; ?>
        </div>
      <?php endif; ?>
    <div class="card-body mt-3">
      
      <form action="admin/crud/insertSugestao.php" method="POST">
        <div class="form-group mb-3">
        
          <input type="text" name="nome" id="" class="form-control" placeholder="*Nome" required>
        </div>
        <div class="form-group  mb-3">
        
          <input type="text" name="email" id="" class="form-control" placeholder="*Email" required>
        </div>
        <div class="form-group mb-3">
        
          <input type="text" name="telefone" id="" class="form-control" placeholder="*Telefone" required>
        </div>
        <div class="form-group mb-3">
          <textarea name="mensagem" id="" rows="5" class="form-control w-100" placeholder="*Mensagem" required></textarea>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" required>
            <label class="form-check-label" for="chk-rgpd">Tomei conhecimento e aceito a <strong><a class="data-protection" href="#" target="_blank">Política&nbsp;de&nbsp;Privacidade</a></strong></label>
        </div>
        
          <button class="btn btn-outline-dark btn-block btn-success text-white mt-3 px-4" id="btn-s" type="submit">Enviar</button>
        </div>
      </form>
    </div>
  </div>

  <div class="col-12 col-xl-6 mt-1 mx-5">
    
    <h2 class="text-danger mt-2"><i class="far fa-clock text-dark"></i>&nbsp;Horario</h2>
    <h5 class="mt-3">Seg. a Sex.: 9:00 - 20:00</h5>
    <h5 class="">Sábado: 9:30 - 18:30</h5>
    <h5 class="">Domingo: 09:30 - 18:00</h5>
    <h5 class="mt-5"><i class="fas fa-phone-square-alt"></i>&nbsp;&nbsp;231472544</h5>
  
        
  </div>
  </div>
</div>

<!-- Rodapé -->
<?php  
require 'includes/footer.php';
?> 

<!-- Top Scroll-->
<?php  
require 'includes/scrolltop.php';
?> 

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/auto.js"></script>
<script src="js/scrolltop.js"></script>

<script>
</script>
</body>
</html>