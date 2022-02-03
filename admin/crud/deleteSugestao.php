

<?php
require '../includes/connection.php';

$id_sugestao = $_GET['id'];
$message = '';

$sql = 'DELETE FROM tb_sugestoes 
WHERE id_sugestao=:id_sugestao';
$statement = $dbh->prepare($sql);
if ($statement->execute([':id_sugestao' => $id_sugestao])) {
	
}

	if($statement && $statement->rowCount() == 1){

      $delete = 1;
    }
    else{
      $delete = 0;
    }


header('Location: ../messageAdmin.php?delete='.$delete);


?>
