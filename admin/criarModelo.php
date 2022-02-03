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
if (isset ($_POST['modelo']) && isset ($_POST['id_marca']) ) {
  $modelo= $_POST['modelo'];
  $id_marca= $_POST['id_marca'];

  $sql = 'INSERT INTO tb_modelos(modelo, id_marca) VALUES(:modelo, :id_marca)';
  $statement = $dbh->prepare($sql);
  if ($statement->execute([':modelo' => $modelo, ':id_marca' => $id_marca])) {
    $message = 'Modelo criado com sucesso!';
    $alert = " alert-success ";
  } else{
    $message = 'Erro... Selecione uma marca';
    $alert = " alert-danger ";

  }
}

?>

<!-- Botão Voltar -->
<div class="container mt-5">
  <div class="d-flex justify-content-start mt-4">
    <a href="autoAdmin.php" class="btn btn-secondary btn-lg" role="button"><i class="fas fa-arrow-left"></i>&nbsp;voltar</a>

  </div>
</div>

<div class="container">
  <div class="col-6 card mt-5" style="min-width: 300px;">
    <div class="card-header">
      <h5>Modelo:*</h5>
    </div>
    <div class="card-body mt-3">
      <?php if(!empty($message)): ?>
        <div class="alert <?php echo $alert ?>">
          <?= $message; ?>
        </div>
      <?php endif; ?>

      <form method="post">
        <div class="form-group">
          <input type="text" name="modelo" id="" class="form-control" required>
        </div>
        <h5 class="mt-5">A que marca pertence?</h5>
        <select class="form-select my-3" aria-label="Escolha da marca" name="id_marca">
              <option selected>Selecione uma opção*</option>
                <?php 
                $sql="SELECT DISTINCT marca, id_marca 
                FROM tb_marcas";
                $stmt = $dbh -> prepare($sql);
                $stmt->execute();
                while ( $obj = $stmt->fetchObject()) {?>
              <option value="<?=$obj->id_marca?>" id="id_marca" ><?= $obj->marca ?></option>
                <?php } ?>
            </select>
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