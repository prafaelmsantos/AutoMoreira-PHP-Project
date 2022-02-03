<?php 
require '../includes/connection.php';

$id_carro = $_GET['id'];
$novidade = $_GET['novidade'];

$sql = 'UPDATE tb_carros
		SET novidade = :novidade
		WHERE id_carro = :id_carro';
$sth = $dbh->prepare($sql);
$sth->bindParam(':novidade', $novidade, PDO::PARAM_INT);
$sth->bindParam(':id_carro', $id_carro, PDO::PARAM_INT);
$sth->execute();


header('Location: ' . $_SERVER['HTTP_REFERER']);
$sth = null;
die();
?>