
<?php 

require '../includes/connection.php';

if(isset($_POST['id_carro'])){
  $id_carro = $_POST['id_carro'];
}


if (isset ($_POST['id_marca'])
  && !empty($_POST['id_marca']) 
  && isset($_POST['id_modelo'])
  && !empty($_POST['id_modelo']) 
  && isset ($_POST['versao']) 
  && isset ($_POST['ano']) 
  && isset ($_POST['id_combustivel']) 
  && isset ($_POST['obs']) 
  && isset ($_POST['preco']) 
  && isset ($_POST['cor']) 
  && isset ($_POST['n_portas']) 
  && isset ($_POST['transmissao']) 
  && isset ($_POST['cilindrada']) 
  && isset ($_POST['potencia'])) {


    $id_marca = $_POST['id_marca'];
    $id_modelo = $_POST['id_modelo'];
    $versao = $_POST['versao'];
    $ano = $_POST['ano'];
    $id_combustivel = $_POST['id_combustivel'];
    $obs = $_POST['obs'];
    $preco = $_POST['preco'];
    $cor = $_POST['cor'];
    $n_portas = $_POST['n_portas'];
    $transmissao = $_POST['transmissao'];
    $cilindrada = $_POST['cilindrada'];
    $potencia= $_POST['potencia'];


    $sql = 'UPDATE tb_carros 
    SET id_marca=:id_marca, id_modelo=:id_modelo, versao=:versao, ano=:ano, id_combustivel=:id_combustivel, obs=:obs, preco=:preco, cor=:cor, n_portas=:n_portas, transmissao=:transmissao, cilindrada=:cilindrada, potencia=:potencia
    WHERE id_carro=:id_carro';
    $statement = $dbh->prepare($sql);
    
    if ($statement->execute([':id_marca' => $id_marca, ':id_modelo' => $id_modelo, ':id_carro' => $id_carro,':versao' => $versao,':ano' => $ano,':id_combustivel' => $id_combustivel,':obs' => $obs,':preco' => $preco, ':cor' => $cor, ':n_portas' => $n_portas, ':transmissao' => $transmissao, ':cilindrada' => $cilindrada, ':potencia' => $potencia])) {
    }


    if($statement && $statement->rowCount() == 1){

      $update = 1;
    }
    else{
      $update = 0;
    }
}

header('Location: ../editarViatura.php?id='.$id_carro.'&id_marca='.$id_marca.'&id_modelo='.$id_modelo.'&id_combustivel='.$id_combustivel.'&update='.$update);


 ?>