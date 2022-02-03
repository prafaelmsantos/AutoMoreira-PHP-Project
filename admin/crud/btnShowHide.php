<?php 
require '../includes/connection.php';

$id_carro = $_GET['id'];
$visivel = $_GET['visivel'];

$sql = 'UPDATE tb_carros
		SET visivel = :visivel
		WHERE id_carro = :id_carro';
$sth = $dbh->prepare($sql);
$sth->bindParam(':visivel', $visivel, PDO::PARAM_INT);
$sth->bindParam(':id_carro', $id_carro, PDO::PARAM_INT);
$sth->execute();


header('Location: ' . $_SERVER['HTTP_REFERER']);
$sth = null;
die();
?>