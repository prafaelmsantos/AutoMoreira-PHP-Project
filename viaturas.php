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
  #search-btn:hover{
        opacity:0.6;
     
  }
      
</style>
</head>
<body>
  
<?php 
$currentPage = 'viaturas';
require 'includes/connection.php';
require 'includes/menu.php'; 

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



<!-- Form para fazer uma pesquisa -->
<div class="container">
  <div class="card mt-5" style="background-color: #B5B6B9;">

    <div class="card-body mt-3">
      <form method="GET" action="viaturas.php">
        <div class="row">
          
        <div class="col-12 col-md-6 col-lg-4">
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
      <div class="col-12 col-md-6 col-lg-4">
        <select class="form-select mb-4" aria-label="Escolha do modelo"  name="pmodelo" id="pmodelo">
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
      <div class="col-12 col-md-6 col-lg-4">
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
      <div class="col-12 col-md-6 col-lg-4">
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
      <div class="col-12 col-md-6 col-lg-4">
        <input class="form-control mb-3" type="text" value="" name="pprecomin" placeholder="Preço min">
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <input class="form-control mb-3" type="text" value="" name="pprecomax" placeholder="Preço max">
      </div>
        
        <div class="form-group d-flex justify-content-end">
          <button class="btn btn-light mt-3 px-4 py-2" id="search-btn" type="submit">Procurar</button>
        </div>
        </div>
      </form>
    </div>
  </div>
</div>



<!-- Query para adicionar novos parametros -->
<?php 
$sql='SELECT id_carro, m.id_marca, m.marca,md.id_modelo, md.modelo, c.versao, c.ano, c.preco, c.foto1, d.combustivel 
     FROM tb_carros c 
     INNER JOIN tb_marcas m ON c.id_marca=m.id_marca 
     INNER JOIN tb_modelos md ON md.id_modelo  = c.id_modelo 
     INNER JOIN tb_combustivel d ON d.id_combustivel=c.id_combustivel 
     WHERE c.visivel=1 AND c.preco >= :preco_min AND c.preco <= :preco_max ';


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


 <!-- Numero de veiculos listados -->
<div class="container mt-5">
  <div class="card">
    <div class="card-body text-center">
      <span class="">
        <?php 
          if($count==0){
            echo "Sem Resultados!";
          }
          else{
            echo $count," viaturas encontradas...";
          }
        ?>
      </span>
    </div>
  </div>
</div>
</div>


<!-- Listagem de Veiculos -->
<div class="container mt-5 my-5">
  <div class="row">
    <?php 
      while ($obj = $stmt->fetchObject()) {
      ?>
    <div class="col-xl-4 col-md-6 col-12 mt-3">
      <div class="card" style="background-color: #F6F4F4">
        <img class="card-img-top" src="admin/images/viaturas/<?= $obj->foto1 ?>" alt="Card image cap">
        <div class="card-body mt-2">
          <h3 class="card-title mx-2"><?= $obj->marca ?></h3>
          <h5 class="card-title mx-2"><?= $obj->modelo ?>&nbsp;<?= $obj->versao ?></h5>
          <h6 class="mt-3 mx-2"><?= $obj->ano ?>&nbsp;&nbsp;<?= $obj->combustivel ?></h6>
            <h6 class="mt-4 mx-2"><?= number_format($obj->preco,2,',',' ') ?> €</h6>
          <div class="d-flex justify-content-end">
            <a href="detalhes.php?id=<?= $obj->id_carro ?>" class="btn btn-danger py-2 px-4" role="button" aria-pressed="true">Ver&nbsp;mais</a></div>
          
        </div>
      </div>
    </div>
  <?php } ?>
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

document.getElementById('pmarca').onchange = function (e) {
  console.log(this.value);
  id = this.value;

  document.querySelectorAll('.options-modelos').forEach(function(elem){
    if(elem.dataset.idmarca != id) elem.classList.add('d-none');
    else elem.classList.remove('d-none');
  })
}
// capturar o evento change no select da marca
//esconder as options do select  modelo que tem o campo data-marcaid = marcaid



</script>
</body>
</html>