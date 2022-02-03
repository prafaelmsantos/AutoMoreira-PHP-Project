<?php


require '../includes/connection.php'; 
if (isset ($_POST['id_marca']) 
  && !empty($_POST['id_marca'])
  && isset ($_POST['id_modelo'])
  && !empty($_POST['id_modelo']) 
  && isset ($_POST['versao']) 
  && isset ($_POST['ano']) 
  && isset ($_POST['combustivel'])
  && !empty($_POST['combustivel'])
  && isset ($_POST['obs']) 
  && isset ($_POST['preco']) 
  && isset ($_POST['cor']) 
  && isset ($_POST['n_portas']) 
  && isset ($_POST['transmissao']) 
  && isset ($_POST['cilindrada']) 
  && isset ($_POST['potencia'])
  && isset($_FILES['foto1'])
  && isset($_FILES['foto2'])
  && isset($_FILES['foto3']) 
 
   ) {

    $id_marca= $_POST['id_marca'];
    $id_modelo= $_POST['id_modelo'];
    $versao = $_POST['versao'];
    $ano = $_POST['ano'];
    $combustivel = $_POST['combustivel'];
    $obs = $_POST['obs'];
    $preco = $_POST['preco'];
    $cor = $_POST['cor'];
    $n_portas = $_POST['n_portas'];
    $transmissao = $_POST['transmissao'];
    $cilindrada = $_POST['cilindrada'];
    $potencia= $_POST['potencia'];

    //Insert de fotos
    $imgFile1 = $_FILES['foto1']['name'];
    $tmp_dir1 = $_FILES['foto1']['tmp_name'];
    $imgSize1 = $_FILES['foto1']['size'];

    $imgFile2 = $_FILES['foto2']['name'];
    $tmp_dir2 = $_FILES['foto2']['tmp_name'];
    $imgSize2 = $_FILES['foto2']['size'];

    $imgFile3 = $_FILES['foto3']['name'];
    $tmp_dir3 = $_FILES['foto3']['tmp_name'];
    $imgSize3 = $_FILES['foto3']['size'];

    $upload_dir = '../images/viaturas/'; // upload directory
 
    $imgExt1 = strtolower(pathinfo($imgFile1,PATHINFO_EXTENSION)); // get image extension
    $imgExt2 = strtolower(pathinfo($imgFile2,PATHINFO_EXTENSION)); // get image extension
    $imgExt3 = strtolower(pathinfo($imgFile3,PATHINFO_EXTENSION)); // get image extension
  
    // valid image extensions
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
    // rename uploading image
    $foto1 = rand(1000,1000000).".".$imgExt1;
    $foto2 = rand(1000,1000000).".".$imgExt2;
    $foto3 = rand(1000,1000000).".".$imgExt3;



    move_uploaded_file($tmp_dir1,$upload_dir.$foto1);
    move_uploaded_file($tmp_dir2,$upload_dir.$foto2);
    move_uploaded_file($tmp_dir3,$upload_dir.$foto3);


    $sql = 'INSERT INTO tb_carros(id_marca,id_modelo,versao, ano, id_combustivel, obs, preco, cor, n_portas, transmissao, cilindrada, potencia, foto1, foto2, foto3) VALUES(:id_marca,:id_modelo,:versao,:ano,:combustivel,:obs,:preco,:cor,:n_portas,:transmissao,:cilindrada,:potencia, :foto1, :foto2, :foto3)';
    $statement = $dbh->prepare($sql);
    if ($statement->execute([':id_marca' => $id_marca,':id_modelo' => $id_modelo,':versao' => $versao,':ano' => $ano,':combustivel' => $combustivel,':obs' => $obs,':preco' => $preco,':cor' => $cor,':n_portas' => $n_portas,':transmissao' => $transmissao,':cilindrada' => $cilindrada,':potencia' => $potencia,':foto1' => $foto1,':foto2' => $foto2, ':foto3' => $foto3])) {
      //$message = 'Inserido com sucesso!';
    }
    if($statement && $statement->rowCount() == 1){

      $insert = 1;
    }
    else{
      $insert = 0;
    }
}


    

header('Location: ../criarViatura.php?insert='.$insert);

?>