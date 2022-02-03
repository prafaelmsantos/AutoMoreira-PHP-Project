<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Auto Moreira</title>
  <link rel="icon" type="image/x-icon" href="../images/car.ico"/>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/fontawesome.min.css">
  <link rel="stylesheet" href="css/auto.css">
  <style>
    body{
      background-color: #EFEEEE;
        
    }
  </style>
</head>

<body>
<?php
require 'includes/connection.php'; 
$message = '';
if (isset ($_POST['marca']) ) {
  $marca = $_POST['marca'];

  $sql = 'INSERT INTO tb_marcas(marca) VALUES(:marca)';
  $statement = $dbh->prepare($sql);
  if ($statement->execute([':marca' => $marca])) {
    $message = 'Marca criada com sucesso!';
  }else{
    $message = 'Erro a criar a marca!';
  }
}

?>


<!-- Botão Voltar -->
<div class="container mt-5">
  <div class="d-flex justify-content-start mt-4">
    <a href="autoAdmin.php" class="btn btn-secondary btn-lg" role="button"><i class="fas fa-arrow-left"></i>&nbsp;voltar</a>

  </div>
</div>


<!-- Form para criar uma marca -->
<div class="container">
  <div class="col-6 card mt-5">
    <div class="card-header">
      <h5>Marca:*</h5>
    </div>
    <div class="card-body mt-3">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
        
          <input type="text" name="marca" id="" class="form-control" required>
        </div>
        
        <div class="form-group">
          <button class="btn btn-outline-dark btn-block btn-success text-white mt-3 px-4" type="submit">Criar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<hr class="container">

<script src="js/bootstrap.bundle.min.js"></script>
<script>

</script>
</body>
</html>