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

<!-- Botão Voltar -->
<div class="container mt-5">
  <div class="d-flex justify-content-start mt-4">
    <a href="autoAdmin.php" class="btn btn-secondary btn-lg" role="button"><i class="fas fa-arrow-left"></i>&nbsp;voltar</a>
  </div>
</div>


<?php
require 'includes/connection.php'; 
$id_carro = $_GET['id'];

$id_marca = $_GET['id_marca'];
$id_modelo = $_GET['id_modelo'];
$id_combustivel = $_GET['id_combustivel'];
$message = '';


?>
<?php 
    $msg='';
    if( isset($_GET['update']) ) {
      $update = $_GET['update'];
      if ($update == 1) {
        $message = 'Dados atualizados com sucesso!';
      }else{
        $message = 'Nenhuma atualização efetuada!';
      }  
    }   
    ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header" style="background-color: #A4A4A4;">
      <h2>Editar dados da Viatura</h2>
    </div>
    <div class="card-body mt-3">
      <?php if(!empty($message)): ?>
        <div class="alert alert-warning">
          <?= $message; ?>
        </div>
      <?php endif; ?>

      <form id="" action="crud/updateViatura.php" method="post" enctype="multipart/form-data">
        <div class="row">
                <input type="hidden" name="id_carro" value="<?php echo $id_carro; ?>">
                <input type="hidden" name="id_marca" value="<?php echo $id_marca; ?>">
                <input type="hidden" name="id_modelo" value="<?php echo $id_modelo; ?>">
                <input type="hidden" name="id_combustivel" value="<?php echo $id_combustivel; ?>">
          <div class="col-6">
            <h5>Marca:</h5>

            <?php 

            $sql="SELECT *
            FROM tb_marcas";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
        

            ?>
            <select class="form-select form-select" aria-label="Escolha da marca" name="id_marca" id="pmarca">
              <option class="" value="0" selected >Selecione uma opção</option>
              <?php
              while($obj = $stmt->fetchObject()){ 
                if($id_marca == $obj->id_marca ) 
                  $selected = ' selected ';
                else $selected = '';

               ?>
              <option value="<?= $obj->id_marca ?>" <?= $selected ?> ><?= $obj->marca ?></option>
       
              <?php 
              } 
              ?>
            </select>

            <?php 
            $sql="SELECT*
            FROM tb_modelos";
            $stmt = $dbh -> prepare($sql);
            $stmt->execute();
            ?>
            <h5 class="mt-2">Modelo:</h5>
            <select class="form-select form-select " aria-label="Escolha do modelo" name="id_modelo" id="pmodelo">
              <option class="" value="0" selected >Selecione uma opção</option>

              <?php
              while($obj = $stmt->fetchObject()){ 
                if($id_modelo == $obj->id_modelo ) 
                  $selected = ' selected ';
                else $selected = '';
               ?>
              <option class="options-modelos" data-idmarca="<?= $obj->id_marca ?>" value="<?= $obj->id_modelo ?>" <?= $selected ?> ><?= $obj->modelo ?></option>
       
              <?php 
              } 
              ?>
             
            </select>
             <?php 

            $sql="SELECT * FROM tb_combustivel ORDER BY combustivel";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            

            ?>
            <h5 class="mt-2">Combustivel:</h5>
            <select class="form-select form-select" aria-label="Escolha do Combustivel" name="id_combustivel">

              <?php
              while($obj = $stmt->fetchObject()){ 
                if($id_combustivel == $obj->id_combustivel ) 
                  $selected = ' selected ';
                else $selected = '';

               ?>
              <option value="<?= $obj->id_combustivel?>" <?= $selected ?> ><?= $obj->combustivel ?></option>
       
              <?php 
              } 
              ?>
        
            </select>

             <?php 

            $sql="SELECT tb_carros.*,tb_marcas.*,tb_modelos.*,tb_combustivel.* 
            FROM tb_carros 
            INNER JOIN tb_marcas ON tb_carros.id_marca=tb_marcas.id_marca 
            INNER JOIN tb_modelos ON tb_carros.id_modelo= tb_modelos.id_modelo 
            INNER JOIN tb_combustivel ON tb_carros.id_combustivel=tb_combustivel.id_combustivel 
            WHERE tb_carros.id_carro=$id_carro";
            $stmt = $dbh -> prepare($sql);
            $stmt->execute();
            $obj = $stmt->fetchObject();

            ?>
            <div class="form-group mt-3">
              <h5 for="">Observações:</h5>
              <textarea name="obs" id="text-area" rows="14" class="w-100"><?= $obj->obs?></textarea>
            </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <h5 for="">Versão:</h5>
            <input type="text" name="versao" id="" class="form-control" value="<?= $obj->versao?>">
          </div>
          <div class="form-group mt-2">
              <h5 for="">Ano:</h5>
              <input type="number" name="ano" id="" class="form-control" value="<?= $obj->ano?>">
          </div>
          <div class="form-group mt-2">
              <h5 for="">Preço:</h5>
              <input type="text" name="preco" id="" class="form-control" value="<?= $obj->preco?>">
          </div>
          <div class="form-group mt-2">
              <h5 for="">Cor:</h5>
              <input type="text" name="cor" id="" class="form-control" value="<?= $obj->cor?>">
          </div>
          <div class="form-group mt-2">
              <h5 for="">Nº de Portas:</h5>
              <input type="text" name="n_portas" id="" class="form-control" value="<?= $obj->n_portas?>">
          </div>
          <div class="form-group mt-2">
              <h5 for="">Transmissão:</h5>
              <input type="text" name="transmissao" id="" class="form-control" value="<?= $obj->transmissao?>">
          </div>
          <div class="form-group mt-2">
              <h5 for="">Cilindrada:</h5>
              <input type="text" name="cilindrada" id="" class="form-control" value="<?= $obj->cilindrada?>">
          </div>
          <div class="form-group mt-2">
              <h5 for="">Potência:</h5>
              <input type="text" name="potencia" id="" class="form-control" value="<?= $obj->potencia?>">
          </div>
        </div>
      </div>

        <div class="d-flex align-content-end justify-content-end">
          <button class="btn btn-outline-dark btn-block btn-warning mt-3 px-5" name="submit" type="submit">Editar</button>
        </div>

      </form>
    </div>
  </div>
</div>

<?php 

    if( isset($_GET['update_foto1']) &&isset($_GET['update_foto2'])&&isset($_GET['update_foto3']) ) {
      $update_foto1 = $_GET['update_foto1'];
      $update_foto2 = $_GET['update_foto2'];
      $update_foto3 = $_GET['update_foto3'];
      if ($update_foto1 == 1) {
        $msg1 = 'Foto 1 atualizada!';
      }
      if ($update_foto2 == 1) {
        $msg2 = 'Foto 2 atualizada!';
      }
      if ($update_foto3 == 1) {
        $msg3 = 'Foto 3 atualizada!';
      } 
    }   
?>
<div class="container mt-4 card mb-5">
  <div class="row">
    <div class="card-header" style="background-color: #A4A4A4;">
      <h2>Editar Fotos da Viatura</h2>
    </div>
    <div class="col-4 card-body px-3 mb-2">
      <form action="crud/updateFoto.php" method="POST" enctype="multipart/form-data">
        <div class="form-group mt-2">
                <input type="hidden" name="id_carro" value="<?php echo $id_carro; ?>">
                <input type="hidden" name="id_marca" value="<?php echo $id_marca; ?>">
                <input type="hidden" name="id_modelo" value="<?php echo $id_modelo; ?>">
                <input type="hidden" name="id_combustivel" value="<?php echo $id_combustivel; ?>">
                <h5 class="mt-3">Foto 1:</h5>
                <input type="file" name="foto1" accept="image/*" id="" class="form-control mt-3" required>
                <img src="images/viaturas/<?= $obj->foto1 ?>" class="form-control w-50 mt-3">
            </div>
            <div class="d-flex justify-content-start mb-3">
          <button class="btn btn-outline-dark btn-block btn-warning mt-3 px-5" name="submit" type="submit">Editar</button>
        </div>
      </form>
    </div>
    <div class="col-4 card-body px-3 mb-2">
      <form action="crud/updateFoto.php" method="POST" enctype="multipart/form-data">
        <div class="form-group mt-2">
                <input type="hidden" name="id_carro" value="<?php echo $id_carro; ?>">
                <input type="hidden" name="id_marca" value="<?php echo $id_marca; ?>">
                <input type="hidden" name="id_modelo" value="<?php echo $id_modelo; ?>">
                <input type="hidden" name="id_combustivel" value="<?php echo $id_combustivel; ?>">
                <h5 class="mt-3">Foto 2:</h5>
                <input type="file" name="foto2" accept="image/*" id="" class="form-control mt-3" required>
                <img src="images/viaturas/<?= $obj->foto2 ?>" class="form-control w-50 mt-3">
            </div>
            <div class="d-flex justify-content-start mb-3">
          <button class="btn btn-outline-dark btn-block btn-warning mt-3 px-5" name="submit" type="submit">Editar</button>
        </div>
      </form>
    </div>
    
    <div class="col-4 card-body px-3 mb-2">
      <form action="crud/updateFoto.php" method="POST" enctype="multipart/form-data">
        <div class="form-group mt-2">
                <input type="hidden" name="id_carro" value="<?php echo $id_carro; ?>">
                <input type="hidden" name="id_marca" value="<?php echo $id_marca; ?>">
                <input type="hidden" name="id_modelo" value="<?php echo $id_modelo; ?>">
                <input type="hidden" name="id_combustivel" value="<?php echo $id_combustivel; ?>">
                <h5 class="mt-3">Foto 3:</h5>
                <input type="file" name="foto3" accept="image/*" id="" class="form-control mt-3" required>
                <img src="images/viaturas/<?= $obj->foto3 ?>" class="form-control w-50 mt-3">
            </div>
            <div class="d-flex justify-content-start mb-3">
          <button class="btn btn-outline-dark btn-block btn-warning mt-3 px-5" name="submit" type="submit">Editar</button>
          
        </div>
      </form>
    </div>
    
  </div>
  <div class="row mb-3">
    <div class="col-4 mt-2">
      <?php if(!empty($msg1)): ?>
          <div class="alert alert-warning"><?= $msg1; ?></div>
        <?php endif; ?>
    </div>
    <div class="col-4 mt-2">
      <?php if(!empty($msg2)): ?>
          <div class="alert alert-warning"><?= $msg2; ?></div>
        <?php endif; ?>
    </div>
    <div class="col-4 mt-2">
      <?php if(!empty($msg3)): ?>
          <div class="alert alert-warning"><?= $msg3; ?></div>
        <?php endif; ?>
    </div>
  </div>
</div>



<script src="js/bootstrap.bundle.min.js"></script>
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