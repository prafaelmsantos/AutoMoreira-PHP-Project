<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Auto Moreira</title>
	<link rel="icon" type="image/x-icon" href="images/car.ico"/>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/auto.css">
	<style>
	
    </style>
</head>
<body>


<!-- Menu Principal -->
<?php 
$currentPage = 'sobre'; 
require 'includes/menu.php';
?> 

<!-- Sobre a Empresa-->
<div class="container mt-5">
	<div class="row py-3">
	
		<div class="col-12 col-xl-6">
			<img id="main-image" src="images/sobre3.jpg" alt="" class="w-100">
		</div>

		<div class="col-12 col-xl-6">
			<div class="mx-4">
				
				<h1 class="mt-xl-3 mt-5">Sobre Nós</h1>
				<h5 class="mt-xl-2 mt-5">O Auto Moreira - Venda e Reparação de Automóveis desenvolve a sua atividade com o CAE 45110 - Comércio de veículos automóveis ligeiros. É uma empresa que conta com mais de 15 anos de experiência no mercado de venda automóvel e tem como principal missão a Conquista, Satisfação e Fidelização do cliente, garantindo sempre a melhor Qualidade e Confiança nos seus negócios.</h5>
				<h5 class="">Dedicamo-nos ao comércio e reparação de automóveis, colocando à sua disposição uma vasta gama de viaturas para que fique com a certeza de que no Auto Moreira encontrará a viatura que tem procurado.</h5>
				<h5 class="">Para além da venda de automóveis e da prestação de serviços no pós-venda o Auto Moreira pretende assegurar a qualidade dos produtos vendidos através da prestação de garantias e da assistência em oficina própria oficial, em todos os sectores.</h5>
			</div>
		</div>
	</div>	

</div>


<!-- Financiamento e Garantia -->			
<div class="container mt-5 mb-5 p-5" style="background-color:#E8EAEA;">
	<div class="row mt-2">
		<div class="col-12 col-xl-6">
			<h1 class="mt-2">Financiamento</h1>
			<h3 class="mt-4">Os mais variados tipos de financiamento, para que juntos possamos encontrar a proposta para si.</h3>
			<h5 class="mt-5">O Auto Moreira coloca à sua disposição os mais variados tipos de financiamento, para que juntos possamos encontrar a proposta que mais se adequa às suas necessidades. E porque a decisão de se financiar é de grande importância e responsabilidade para si, da nossa parte irá encontrar profissionais responsáveis e dedicados, para o ajudarem com este processo.</h5>
			<h5 class="mt-3">Com prazos até aos 120 meses e sem entrada inicial...</h5>
		</div>
		<div class="col-12 col-xl-6 mt-5">
			<img src="images/financiamento.jpg" style="width: 100%; height: 80%;" alt="financiamento">
		</div>
	</div>
	<div class="row mt-4">
		<div class="col-12 col-xl-6">
			<h1 class="mt-2">Garantia</h1>
			<h4 class="mt-4">O Auto Moreira oferece-lhe 1 ano de Garantia por de mútuo acordo. Fale connosco para encontrarmos a melhor opção para a sua viatura.</h4>	
		</div>
		<div class="col-12 col-xl-6 mt-4">
			<img src="images/garantia.jpg" style="width: 100%; height: 80%;" alt="garantia">
		</div>
	</div>		
</div>



<!-- Top Scroll-->
<?php  
require 'includes/scrolltop.php';
?> 

<!-- Rodapé -->
<?php  
require 'includes/footer.php';
?> 

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/auto.js"></script>
<script src="js/scrolltop.js"></script>


<script>

</script>
</body>
</html>