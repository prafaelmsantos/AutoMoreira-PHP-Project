<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Auto Moreira - Sugestões</title>
	<link rel="icon" type="image/x-icon" href="../images/car.ico"/>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/fontawesome.min.css">
	<link rel="stylesheet" href="css/auto.css">
	<style>
		.msg-select-pointer:hover{
		
			background-color: #3C3B3B;
			cursor: pointer;
		}
		body{
			background-image: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(images/back10.jpg);
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
	<h1 class="text-center text-white px-5 py-5">Sugestões de Clientes</h1>
</div>



<!-- Botão Voltar -->
<div class="container mt-5">
  <div class="d-flex justify-content-start justify-content-lg-end mt-4 mb-5">
    <a href="index.php" class="btn btn-dark btn-lg" role="button" aria-pressed="true"><i class="fas fa-arrow-left"></i>&nbsp;voltar</a>
  </div>
</div>



<?php 
	
$sql='SELECT * 
FROM tb_sugestoes';
$stmt = $dbh -> prepare($sql);
$stmt->execute();
$sth = $dbh->prepare($sql);
$sth->execute();
$count=$sth->rowCount();

?>

<?php  
    $msg='';
    if( isset($_GET['delete']) ) {
      $update = $_GET['delete'];
      if ($update == 1) {
        $msg = 'Sugestão de cliente apagada!';
      }else{
        $msg = 'Erro a apagar a Sugestão!';
      }  
    }   
    


 ?>
<!-- lista de sugestoes -->
<div class="container mt-5 text-white">
	<div class="card-body">
      <?php if(!empty($msg)): ?>
        <div class="h5 alert alert-danger">
          <?= $msg; ?>
        </div>
      <?php endif; ?>
	</div>
	
	<div class="row h5 mt-5 mb-4">
		<div class="col-2">Nome</div>
		<div class="col-2">Email</div>
		<div class="col-2">Telefone</div>
		<div class="col-3">Mensagem</div>
		<div class="col-2">Data e Hora</div>
	</div>
	<hr class="container">
	<?php 
	while($obj = $sth->fetchObject()){
		$nome = $obj->nome;
		$email = $obj->email;
		$telefone = $obj->telefone;
		$mensagem = $obj->mensagem;
		$data_hora = $obj->data_hora;
		
	 ?>	
	<div class="row mb-4 mt-2 msg-select-pointer py-4">
		<div class="col-2 align-self-center"><?= $nome?></div>
		<div class="col-2 align-self-center"><?= $email ?></div>
		<div class="col-2 align-self-center"><?= $telefone ?></div> 
		<div class="col-3 align-self-center"><?= $mensagem?></div>
		<div class="col-2 align-self-center"><?= $data_hora?></div>
		<div class="col-1 align-self-center"><a onclick="return confirm('Tem a certeza que pretende apagar esta sugestão?')" href="crud/deleteSugestao.php?id=<?= $obj->id_sugestao ?>" class="btn btn-danger px-3 py-2">Apagar</a></div>
	</div>
	<?php 
	}
	?>

	<span class="d-flex justify-content-center mt-3">
	        <?php 
	          if($count==0){
	            echo '<div class="mt-5 mb-5">Nenhuma sugestão de cliente encontrada...</div>';
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

</script>
</body>
</html>