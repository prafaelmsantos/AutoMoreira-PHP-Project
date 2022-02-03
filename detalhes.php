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

  </style>

</head>
<body>



<?php 
$currentPage = 'viaturas';
require 'includes/connection.php';
require 'includes/menu.php'; 

$id = $_GET['id'];

?> 



<?php 

$sql="SELECT tb_carros.*,tb_marcas.*,tb_modelos.*,tb_combustivel.* 
FROM tb_carros 
INNER JOIN tb_marcas ON tb_carros.id_marca=tb_marcas.id_marca 
INNER JOIN tb_modelos ON tb_carros.id_modelo= tb_modelos.id_modelo 
INNER JOIN tb_combustivel ON tb_carros.id_combustivel=tb_combustivel.id_combustivel 
WHERE tb_carros.id_carro=$id";
$stmt = $dbh -> prepare($sql);
$stmt->execute();

?>

<div class="container mt-5 mb-5">
  <?php 
  $obj = $stmt->fetchObject();
  ?>

  <div class="row">
    <h2 class="mx-5 mb-2">
      <?= $obj->marca ?> <?= $obj->modelo ?> <?= $obj->versao ?>
    </h2>
  </div>
  <h4 class="d-flex justify-content-end mt-5">
    <div>
      <?= number_format($obj->preco,2,',',' ') ?> € 
    </div>
  </h4>
  <hr class="container">
  <div class="row">

    <div class="col-lg col-md-12 col-12">
      
      <!-- carousel -->
      <div id="slideshow" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="admin/images/viaturas/<?= $obj->foto1 ?>" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="admin/images/viaturas/<?= $obj->foto2 ?>" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="admin/images/viaturas/<?= $obj->foto3 ?>" class="d-block w-100" alt="...">
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#slideshow" data-slide-to="0" class="active"></li>
          <li data-target="#slideshow" data-slide-to="1"></li>
          <li data-target="#slideshow" data-slide-to="2"></li>
        </ol>
        

        <a class="carousel-control-prev" href="#slideshow" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          </a>
          <a class="carousel-control-next" href="#slideshow" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          </a>
      </div>
    </div>

    <h5 class="col-lg-4 col-md-12 col-12 mt-4 mx-4">
      
      <div class="mt-2">
        Ano: <?= $obj->ano ?> 
      </div>
      <hr class="container">
      <div>
        Cor: <?= $obj->cor ?> 
      </div>
      <hr class="container">
      <div>
        Nº de portas: <?= $obj->n_portas ?> Portas
      </div>
      <hr class="container">
      <div>
        Transmissão: <?= $obj->transmissao ?> 
      </div>
      <hr class="container">
      <div>
        Cilindrada: <?= number_format($obj->cilindrada,0,' ',' ') ?> cm3
      </div>
      <hr class="container">
      <div>
        Potência: <?= $obj->potencia ?> Cv 
      </div>
      <hr class="container">
      <div>
        Combustivel: <?= $obj->combustivel ?>
      </div>
      <hr class="container">

   </div>
  </h5>
  
  <hr class="container">
  <div class="row mt-4">
    <div class="col-6">
      <h3 class="mb-2">Observações:</h3>
      <h6 class=""><?= $obj->obs ?></h6>
      <h3 class="mt-4 mb-2">Garantia:</h3>
      <h6 class="">1 ano (por mútuo acordo).</h6>
    </div>
  </div>
</div>

<!-- Top Scroll-->
<?php  
require 'includes/scrolltop.php';
?> 

<!-- Rodapé -->
<?php  
require 'includes/footer.php';
?> 

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/auto.js"></script>
<script src="js/scrolltop.js"></script>
<script>


</script>
</body>
</html>