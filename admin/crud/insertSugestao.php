
<?php 

require '../includes/connection.php'; 

$message = '';

$data_hora=new DateTime();
$data_hora=$data_hora->format('d-m-Y H:i:s').'';

if (isset ($_POST['nome']) 
  && isset ($_POST['email']) 
  && isset ($_POST['telefone']) 
  && isset ($_POST['mensagem'])) {

    $nome= $_POST['nome'];
    $email= $_POST['email'];
    $telefone= $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    $sql = 'INSERT INTO tb_sugestoes(nome,email,telefone, mensagem, data_hora) VALUES(:nome,:email,:telefone,:mensagem,:data_hora)';
    $statement = $dbh->prepare($sql);
    if ($statement->execute([':nome' => $nome,':email' => $email,':telefone' => $telefone,':mensagem' => $mensagem,':data_hora' => $data_hora])) {
      $message = 'Mensagem enviada com sucesso!';
    }

    if($statement && $statement->rowCount() == 1){

      $insert = 1;
    }
    else{
      $insert = 0;
    }

}

header('Location: ../../contactos.php?insert='.$insert);


 ?>