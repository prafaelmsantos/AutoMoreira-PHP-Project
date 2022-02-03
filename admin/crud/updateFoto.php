

<?php
require '../includes/connection.php';


if(isset($_POST['id_carro'])){
  $id_carro = $_POST['id_carro'];
}
if(isset($_POST['id_marca'])){
  $id_marca = $_POST['id_marca'];
}
if(isset($_POST['id_modelo'])){
  $id_modelo = $_POST['id_modelo'];
}
if(isset($_POST['id_combustivel'])){
  $id_combustivel = $_POST['id_combustivel'];
}

if(isset($_FILES['foto1'])){

  //Update de fotos
    $imgFile = $_FILES['foto1']['name'];
    $tmp_dir = $_FILES['foto1']['tmp_name'];
    $imgSize = $_FILES['foto1']['size'];

    $upload_dir = '../images/viaturas/'; // upload directory
 
    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
    // valid image extensions
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
    // rename uploading image
    //$foto1 = rand(1000,1000000).".".$imgExt;
    $foto1 = uniqid() . '.' . $imgExt;


    move_uploaded_file($tmp_dir,$upload_dir.$foto1);

    $sql = 'UPDATE tb_carros 
    SET foto1=:foto1
    WHERE id_carro=:id_carro';
    $statement = $dbh->prepare($sql);
    $statement->bindParam(':foto1', $foto1);
    $statement->bindParam(':id_carro', $id_carro);
    $statement->execute();

     if($statement && $statement->rowCount() == 1){

      $update_foto1 = 1;
    
    }
    else{
      $update_foto1 = 0;
    }
     
}

if(isset($_FILES['foto2'])){

  //Update de fotos
    $imgFile = $_FILES['foto2']['name'];
    $tmp_dir = $_FILES['foto2']['tmp_name'];
    $imgSize = $_FILES['foto2']['size'];

    $upload_dir = '../images/viaturas/'; // upload directory
 
    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
    // valid image extensions
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
    // rename uploading image
    //$foto2 = rand(1000,1000000).".".$imgExt;
    $foto2 = uniqid() . '.' . $imgExt;


    move_uploaded_file($tmp_dir,$upload_dir.$foto2);

    $sql = 'UPDATE tb_carros 
    SET foto2=:foto2
    WHERE id_carro=:id_carro';
    $statement = $dbh->prepare($sql);
    $statement->bindParam(':foto2', $foto2);
    $statement->bindParam(':id_carro', $id_carro);
    $statement->execute();

    if($statement && $statement->rowCount() == 1){

      $update_foto2 = 1;
    
    }
    else{
      $update_foto2 = 0;
    }
      
}



if(isset($_FILES['foto3'])){

  //Update de fotos
    $imgFile = $_FILES['foto3']['name'];
    $tmp_dir = $_FILES['foto3']['tmp_name'];
    $imgSize = $_FILES['foto3']['size'];

    $upload_dir = '../images/viaturas/'; // upload directory
 
    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
    // valid image extensions
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
    // rename uploading image
    //$foto3 = rand(1000,1000000).".".$imgExt;
    $foto3 = uniqid() . '.' . $imgExt;


      move_uploaded_file($tmp_dir,$upload_dir.$foto3);

      $sql = 'UPDATE tb_carros 
    SET foto3=:foto3
    WHERE id_carro=:id_carro';
    $statement = $dbh->prepare($sql);
    $statement->bindParam(':foto3', $foto3);
    $statement->bindParam(':id_carro', $id_carro);
    $statement->execute();

    if($statement && $statement->rowCount() == 1){

      $update_foto3 = 1;

    }
    else{
      $update_foto3 = 0;
    }
    
    
}


header('Location: ../editarViatura.php?id='.$id_carro.'&id_marca='.$id_marca.'&id_modelo='.$id_modelo.'&id_combustivel='.$id_combustivel.'&update_foto1='.$update_foto1.'&update_foto2='.$update_foto2.'&update_foto3='.$update_foto3);


?>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/auto.js"></script>
<script>

</script>
</body>
</html>