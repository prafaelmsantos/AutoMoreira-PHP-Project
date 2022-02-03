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

	    #search-title{
	    	color: #4E5562;
			font-size: 3rem;
	    }

	    #search-btn:hover{
	    	opacity:0.6;
	   
	    }

	   #btn-more:hover{
	   		opacity:0.6;
	   }
	   
	</style>
<body>


<?php 
$currentPage = '';
require 'includes/connection.php'; 
require 'includes/menu.php';
?> 


<!-- carousel -->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/front9.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/front10.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/front8.jpg" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/front11.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<!-- Pesquisar Viatura -->
<div class="container py-5 my-5 px-5" style="background-color: #B5B6B9;" >

	<div id="search-title" class="mb-5 px-5">Encontre a sua viatura...</div>
	<form action="viaturas.php" method="GET">
		
		<div class="row px-5">
			<div class="col-12 col-md-6 col-lg-4">
				<select class="form-select form-select-lg mb-3" aria-label="Escolha da marca" name="pmarca" id="pmarca">
		          <option selected value="0">Marca</option>
		          <?php 
		          $sql="SELECT DISTINCT marca, id_marca 
		          FROM tb_marcas";
		          $stmt = $dbh -> prepare($sql);
		          $stmt->execute();
		          while ( $obj = $stmt->fetchObject()) {?>
		            <option value="<?=$obj->id_marca?>"><?= $obj->marca ?></option>
		          <?php } ?>
		        </select>
			</div>
			<div class="col-12 col-md-6 col-lg-4">
				<select class="form-select form-select-lg mb-4" aria-label="Escolha do modelo"  name="pmodelo" id="pmodelo">
		          <option selected value="0">Modelo</option>
		          <?php 
		          $sql="SELECT DISTINCT modelo, id_modelo, id_marca 
		          FROM tb_modelos";
		          $stmt = $dbh -> prepare($sql);
		          $stmt->execute();
		          while ( $obj = $stmt->fetchObject()) {?>
		            <option class="options-modelos d-none" value="<?= $obj->id_modelo?>" data-idmarca="<?= $obj->id_marca ?>"><?= $obj->modelo ?></option>
		          <?php } ?>
		        </select>
			</div>
			<div class="col-12 col-md-6 col-lg-4">
				<select class="form-select form-select-lg mb-3" aria-label="Escolha do Combustivel" name="pcombustivel">
				  <option selected value="0">Combustivel</option>
					<?php 
					$sql="SELECT DISTINCT * 
					FROM tb_combustivel";
					$stmt = $dbh -> prepare($sql);
					$stmt->execute();
					while ( $obj = $stmt->fetchObject()) {?>
						<option value="<?= $obj->id_combustivel?>" id="pcombustivel" ><?= $obj->combustivel?></option>
					<?php } ?>
			
				</select>
			</div>
			<div class="col-12 col-md-6 col-lg-4">
				<select class="form-select form-select-lg mb-3" aria-label="Escolha do Ano" name="pano">
				  <option selected value="0">Ano</option>
				  <?php 
					$sql="SELECT DISTINCT ano 
					FROM tb_carros 
					ORDER BY ano DESC";
					$stmt = $dbh -> prepare($sql);
					$stmt->execute();
					while ( $obj = $stmt->fetchObject()) {?>
						<option value="<?=$obj->ano?>" id="pano" ><?= $obj->ano?></option>
					<?php } ?>
				</select>
			</div>
			<div class="col-12 col-md-6 col-lg-4">
				<input class="form-control form-control-lg mb-3" type="text" value="" name="pprecomin" placeholder="Preço min">
			</div>
			<div class="col-12 col-md-6 col-lg-4">
				<input class="form-control form-control-lg  mb-3" type="text" value="" name="pprecomax" placeholder="Preço max">
			</div>
			<div class="col mt-3">
				<button	 type="submit" class="btn btn-light btn-lg" id="search-btn" value="Procurar">Procurar</button>
			</div>
		</div>
	</form>
</div>


<!-- Novidades: Query para mostrar os veiculos com novidade e visivel igual a 1 -->
<?php 

$sql="SELECT *
	FROM tb_carros c 
	INNER JOIN tb_marcas m ON c.id_marca=m.id_marca 
	INNER JOIN tb_modelos md ON md.id_modelo  = c.id_modelo 
	INNER JOIN tb_combustivel d ON d.id_combustivel=c.id_combustivel 
	WHERE c.novidade=1 AND c.visivel=1";
$stmt = $dbh -> prepare($sql);
$stmt->execute();
$count=$stmt->rowCount();
?>


<div class="container mb-4">
	<h1 class="text-center mt-5 mb-3 card py-3">Novidades</h1>
	<hr class="container">
	<span class="d-flex justify-content-center">
	        <?php 
	        $btn = "py-2 px-4 ";
	        $col = "col-xl-6 col-md-6 ";
	          if($count==0){
	            echo "Sem novidades de momento...";
	          }
	          
	          if($count >2 && $count <= 3 ){
	            $col = "col-xl-4 ";
	         
	          }
	          if($count > 3){
	            $col = "col-xl-3 ";
	            $btn = "py-xl-1 py-2 px-3 px-xl-2 ";
	          }
	          
	        ?>
	</span>
	<div class="row justify-content-center">
		<?php 
	  	while ($obj = $stmt->fetchObject()) {
	  	?>
		<div class="<?php echo $col ?> col-12 mt-3">
			<div class="card" style="background-color: #F6F4F4;">
			  <img class="card-img-top" src="admin/images/viaturas/<?= $obj->foto1 ?>" alt="Card image viatura">
			  <div class="card-body mt-2">
			    <h3 class="card-title mx-2"><?= $obj->marca ?></h3>
			    <h5 class="card-title mx-2"><?= $obj->modelo ?>&nbsp;<?= $obj->versao ?></h5>
			    <h6 class="mt-4 mx-2"><?= $obj->ano ?>&nbsp;&nbsp;<?= $obj->combustivel ?></h6>
        		<h6 class="mt-4 mx-2"><?= number_format($obj->preco,2,',',' ') ?> €</h6>
			    <div class="d-flex justify-content-end">
        		<a href="detalhes.php?id=<?= $obj->id_carro ?>" class="btn btn-danger <?php echo $btn ?>" role="button" aria-pressed="true">Ver&nbsp;mais</a></div>
			    
			  </div>
			</div>
		</div>
	<?php } ?>
	</div>
	<hr class="container">
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
document.getElementById('pmarca').onchange = function (e) {
  console.log(this.value);
  id = this.value;

  document.querySelectorAll('.options-modelos').forEach(function(elem){
  	
    
    if(elem.dataset.idmarca != id){
    	elem.classList.add('d-none');	
    } 
    else{
    	elem.classList.remove('d-none');
    }

  })
}
// capturar o evento change no select da marca
// id da marca
//esconder as options do select  modelo que tem o campo data-marcaid = marcaid

</script>
</body>
</html>