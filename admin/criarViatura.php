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


    if( isset($_GET['insert']) ) {
      $insert = $_GET['insert'];
      if ($insert == 1) {
        $message = 'Viatura criada com sucesso!';
        $alert = " alert-success ";

      }else{
        $message = 'Erro a criar a viatura!';
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

<div class="container mb-5">
  <div class="card mt-5">
    <div class="card-header" style="background-color: #A4A4A4;">
      <h2>Criar Viatura</h2>
    </div>
    <div class="card-body mt-3">
      <?php if(!empty($message)): ?>
        <div class="alert <?php echo $alert ?>">
          <?= $message; ?>
        </div>
      <?php endif; ?>

      <form action="crud/insertViatura.php" id="" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-6">
            <h5>Marca:*</h5>
            <select class="form-select form-select" aria-label="Escolha da marca" name="id_marca" id="pmarca">
              <option value="0" selected>Selecione uma opção</option>
                <?php 
                $sql="SELECT DISTINCT marca, id_marca 
                FROM tb_marcas";
                $stmt = $dbh -> prepare($sql);
                $stmt->execute();
                while ( $obj = $stmt->fetchObject()) {?>
              <option value="<?=$obj->id_marca?>" id="id_marca" ><?= $obj->marca ?></option>
                <?php } ?>
            </select>
            <h5 class="mt-2">Modelo:*</h5>
            <select class="form-select form-select " aria-label="Escolha do modelo" name="id_modelo">
              <option value="0" selected>Selecione uma opção</option>
                <?php 
                $sql="SELECT DISTINCT modelo, id_modelo, id_marca 
                FROM tb_modelos";
                $stmt = $dbh -> prepare($sql);
                $stmt->execute();
                while ( $obj = $stmt->fetchObject()) {?>
              <option class="options-modelos d-none" value="<?= $obj->id_modelo?>" data-idmarca="<?= $obj->id_marca ?>"><?= $obj->modelo ?></option>
                <?php } ?>
            </select>
            <h5 class="mt-2">Combustivel:*</h5>
            <select class="form-select form-select" aria-label="Escolha do Combustivel" name="combustivel">
              <option value="0" selected>Selecione uma opção</option>
                <?php 
                $sql="SELECT * 
                FROM tb_combustivel";
                $stmt = $dbh -> prepare($sql);
                $stmt->execute();
                while ( $obj = $stmt->fetchObject()) {?>
              <option value="<?= $obj->id_combustivel?>" id="combustivel" ><?= $obj->combustivel?></option>
              <?php } ?>
            </select>
            <div class="form-group mt-3">
              <h5 for="">Observações:*</h5>
              <textarea name="obs" id="text-area" rows="14" class="w-100" required=""></textarea>
            </div> 
        </div>
        <div class="col-6">
          <div class="form-group">
            <h5 for="">Versão:*</h5>
            <input type="text" name="versao" id="" class="form-control" required>
          </div>
          <div class="form-group mt-2">
              <h5 for="">Ano:*</h5>
              <input type="number" name="ano" id="" class="form-control" value="2021">
          </div>
          <div class="form-group mt-2">
              <h5 for="">Preço:*</h5>
              <input type="text" name="preco" id="" class="form-control" required>
          </div>
          <div class="form-group mt-2">
              <h5 for="">Cor:*</h5>
              <input type="text" name="cor" id="" class="form-control" required>
          </div>
          <div class="form-group mt-2">
              <h5 for="">Nº de Portas:*</h5>
              <input type="text" name="n_portas" id="" class="form-control" required>
          </div>
          <div class="form-group mt-2">
              <h5 for="">Transmissão:*</h5>
              <input type="text" name="transmissao" id="" class="form-control" required>
          </div>
          <div class="form-group mt-2">
              <h5 for="">Cilindrada:*</h5>
              <input type="text" name="cilindrada" id="" class="form-control" required>
          </div>
          <div class="form-group mt-2">
              <h5 for="">Potência:*</h5>
              <input type="text" name="potencia" id="" class="form-control" required>
          </div>
        </div>
      </div>
      <!-- INSERT de Imagens-->
      <div class="row mt-5">
          <div class="form-group col-4">
            <h5 for="">Foto 1:*</h5>
            <input type="file" name="foto1" id="" class="form-control" required>
          </div>
          <div class="form-group col-4">
            <h5 for="">Foto 2:*</h5>
            <input type="file" name="foto2" id="" class="form-control" required>
          </div>
          <div class="form-group col-4">
            <h5 for="">Foto 3:*</h5>
            <input type="file" name="foto3" id="" class="form-control" required>
          </div>
      </div>
      <div class="d-flex align-content-end justify-content-end mt-5">
          <button class="btn btn-outline-dark btn-block btn-success text-white mt-3 px-5" type="submit">Criar</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script src="js/bootstrap.bundle.min.js"></script>
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
</script>
</body>
</html>