<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Auto Moreira - Viaturas</title>
	<link rel="icon" type="image/x-icon" href="../images/car.ico"/>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/fontawesome.min.css">
	<link rel="stylesheet" href="css/auto.css">
	<style>
		.auto-select-pointer:hover{
		
			background-color: #3C3B3B;
			cursor: pointer;

		}
		
		#search-btn:hover{
        opacity:0.6;
    	}
      
    	body{
			background-image: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(images/back9.jpg);
			background-repeat: no-repeat;
			background-size: cover;		
		}

	</style>
</head>
<body>
<?php 
require 'includes/connection.php';
?> 

<?php


if(isset($_GET['pmarca']) ){
  $marca = $_GET['pmarca'];
}else{
  $marca = "0";
}

if(isset($_GET['pmodelo']) && !empty($_GET['pmodelo']) ){
  $modelo = $_GET['pmodelo'];
}else{
  $modelo = "0";
}

if(isset($_GET['pcombustivel'])){
  $combustivel = $_GET['pcombustivel'];
}else{
  $combustivel = "0";
}

if(isset($_GET['pano'])){
  $ano= $_GET['pano'];
}else{
  $ano = "0";
}

if(isset($_GET['pprecomax'] ) && !empty($_GET['pprecomax'])) {
 $preco_max = $_GET['pprecomax'];
}else{
 $preco_max = 100000000;
}

if(isset($_GET['pprecomin']) && !empty($_GET['pprecomin'])) {
  $preco_min = $_GET['pprecomin'];
}else{
  $preco_min = 0;
}

?>


<div class="container-fluid">
	<h1 class="text-center text-white px-5 py-5" style="font-weight: bold;">Viaturas</h1>
</div>



<!-- Botão Voltar -->
<div class="container mt-5">
  <div class="d-flex justify-content-start justify-content-lg-end mt-4 mb-5">
    <a href="index.php" class="btn btn-dark btn-lg" role="button" aria-pressed="true"><i class="fas fa-arrow-left"></i>&nbsp;voltar</a>
  </div>
</div>


<!-- Form para fazer uma pesquisa -->
<div class="container">
  <div class="mt-5">

    <div class="card-body mt-3">
      <form method="GET" action="autoAdmin.php">
        <div class="row">
	        <div class="col-2">
	        <select class="form-select mb-3" aria-label="Escolha da marca" name="pmarca" id="pmarca">
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
	  
	      <div class="col-2">
	        <select class="form-select mb-3" aria-label="Escolha do modelo"  name="pmodelo" id="pmodelo">
	          <option selected value="0">Modelo</option>
	          <?php 
	          $sql="SELECT DISTINCT modelo, id_modelo, id_marca 
	          FROM tb_modelos";
	          $stmt = $dbh -> prepare($sql);
	          $stmt->execute();
	          while ( $obj = $stmt->fetchObject()) {?>
	            <option class="options-modelos" value="<?= $obj->id_modelo?>" data-idmarca="<?= $obj->id_marca ?>"><?= $obj->modelo ?></option>
	          <?php } ?>
	        </select>
	      </div>
	      <div class="col-2">
	        <select class="form-select mb-3" aria-label="Escolha do Combustivel" name="pcombustivel">
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
	  </div>

      <div class="row">
	    
	    <div class="col-2">
	        <select class="form-select mb-3" aria-label="Escolha do Ano" name="pano">
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
	      <div class="col-2">
	        <input class="form-control mb-3" type="text" value="" name="pprecomin" placeholder="Preço min">
	      </div>
	      <div class="col-2">
	        <input class="form-control mb-3" type="text" value="" name="pprecomax" placeholder="Preço max">
	      </div>
	        
	      <div class="form-group d-flex justify-content-start">
	        <button class="btn btn-primary mt-3 px-3 py-2" id="search-btn" type="submit">Procurar</button>
	      </div>
	  </div>
      </form>
    </div>
  </div>
</div>


<!-- Form para criar Marca, Modelo e Viatura-->
<div class="container mb-5 py-4">
	<div class="d-flex justify-content-end">
		<div class="">
			<div class="dropdown">
			  <button class="btn btn-success dropdown-toggle px-4 py-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Criar
			  </button>
			  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			    <a class="dropdown-item" href="criarMarca.php">Marca</a>
			    <a class="dropdown-item" href="criarModelo.php">Modelo</a>
			    <a class="dropdown-item" href="criarViatura.php">Viatura</a>
			  </div>
			</div>
		</div>
	</div>
</div>


	
<!-- Query para adicionar novos parametros -->
<?php 
$sql='SELECT id_carro, m.id_marca, m.marca,md.id_modelo, md.modelo, c.versao, c.ano, c.preco, c.foto1, d.combustivel, c.visivel, c.novidade, c.id_combustivel
     FROM tb_carros c 
     INNER JOIN tb_marcas m ON c.id_marca=m.id_marca 
     INNER JOIN tb_modelos md ON md.id_modelo  = c.id_modelo 
     INNER JOIN tb_combustivel d ON d.id_combustivel=c.id_combustivel 
     WHERE c.preco >= :preco_min AND c.preco <= :preco_max ';


if($marca != "0"){
  $sql .= ' AND m.id_marca = :marca ';
}

if($modelo != "0"){
  $sql .= ' AND md.id_modelo = :modelo ';
}

if($combustivel != "0"){
  $sql .= ' AND c.id_combustivel = :combustivel ';
}

if($ano != "0"){
  $sql .= ' AND c.ano = :ano ';
}


$stmt = $dbh->prepare($sql);


if($marca != "0"){

 $stmt->bindParam(':marca', $marca, PDO::PARAM_STR); 
} 

if($modelo != "0"){
  $stmt->bindParam(':modelo', $modelo);
} 

if($combustivel != "0"){
  $stmt->bindParam(':combustivel', $combustivel);
} 
if($ano != "0"){
  $stmt->bindParam(':ano', $ano,PDO::PARAM_INT);
}


$stmt->bindParam(':preco_max', $preco_max);

$stmt->bindParam(':preco_min', $preco_min);


$stmt->execute();
$count=$stmt->rowCount();
?>



<!-- lista de carros -->

<div class="container mt-5 text-white">
	<div class="row h5 mb-4">
		<div class="col-1">Foto</div>
		<div class="col-2">Marca</div>
		<div class="col-1">Modelo</div>
		<div class="col-2">Combustivel</div>
		<div class="col-1">Ano</div>
		<div class="col-2">Preço</div>
		<div class="col-2"></div>
		<div class="col-1">Novidade</div>

	</div>
<hr class="container mb-4">
	<?php 
	while($obj = $stmt->fetchObject()){
		$id_carro = $obj->id_carro;
		$id_marca = $obj->id_marca;
		$marca = $obj->marca;
		$id_modelo = $obj->id_modelo;
		$modelo = $obj->modelo;
		$foto1 = $obj->foto1;
		$preco = $obj->preco;
		$ano = $obj->ano;
		$combustivel = $obj->combustivel;

		$visivel = $obj->visivel;
		$novidade = $obj->novidade;

	 ?>	

	<div class="row mb-2 mt-2 auto-select-pointer py-2">
		<div class="col-1">
			<img class="img-fluid" src="images/viaturas/<?= $obj->foto1 ?>" alt="">
		</div>
		<div class="col-2 align-self-center"><?= $marca ?></div>
		<div class="col-1 align-self-center"><?= $modelo ?></div>
		<div class="col-2 align-self-center"><?= $combustivel ?></div> 
		<div class="col-1 align-self-center"><?= $ano ?></div>
		<div class="col-2 align-self-center"><?= number_format($preco,2,',',' ') ?> €</div>
		<div class="col-1 align-self-center"><a href="editarViatura.php?id=<?= $obj->id_carro ?>&id_marca=<?= $obj->id_marca ?>&id_modelo=<?= $obj->id_modelo ?>&id_combustivel=<?= $obj->id_combustivel ?>" class="btn btn-warning px-4 py-2 mx-3" role="button" aria-pressed="true">Editar</a></div>
		
		<div class="col-2 align-self-center">
				<?php 
				if($visivel == 0){
				?>
					<a href="crud/btnShowHide.php?visivel=1&id=<?= $obj->id_carro ?>" class="btn btn-success px-4 py-2 mx-4"><i class="far fa-eye"></i></a>

				<?php 
				}else{
				?>
					<a href="crud/btnShowHide.php?visivel=0&id=<?= $obj->id_carro ?>" class="btn btn-danger px-4 py-2 mx-4"><i class="far fa-eye-slash"></i></a>
						<?php 
						if($novidade == 0){
						?>
						<a href="crud/novidade.php?novidade=1&id=<?= $obj->id_carro ?>" class="btn btn-primary px-4 py-2"><i class="fas fa-check"></i></a>
						<?php 
						}else{
						?>
							<a href="crud/novidade.php?novidade=0&id=<?= $obj->id_carro ?>" class="btn btn-secondary px-4 py-2"><i class="fas fa-times-circle"></i></i></a>
						<?php 
						}
						?>
				<?php 
				}
				?>


			</div>
	</div>

	<?php 
	}
	?>

		
	
	<span class="d-flex justify-content-center mt-3">
	        <?php 
	          if($count==0){
	            echo '<div class="mt-3 mb-2">Nenhuma viatura encontrada...</div>';
	          }
	          
	        ?>
	</span>
	<hr class="container mb-5">
</div>




<!-- Top Scroll-->
<?php  
require 'includes/scrolltop.php';
?> 

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/auto.js"></script>
<script src="js/scrolltop.js"></script>
<script>

document.querySelectorAll('.options-modelos').forEach(function(elem){
    
  
      elem.classList.add('d-none'); 
    
  })


document.getElementById('pmarca').onchange = function (e) {
  console.log(this.value);
  id = this.value;
  if (document.getElementById('pmodelo').value=0) {
    document.getElementById('pmarca').value=0;
  }


  document.querySelectorAll('.options-modelos').forEach(function(elem){
    
    if(elem.dataset.idmarca != id){
      elem.classList.add('d-none');
    } 
    else{
      elem.classList.remove('d-none');
    }

  })
}
</script>
</body>
</html>