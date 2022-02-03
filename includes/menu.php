<?php 
// pagina atual
$cp = $currentPage;
?>

<!-- Menu Principal -->
<nav class="navbar navbar-expand-xl navbar-light bg-warning " id="navbar-a" style="font-size: 1.6rem">
	<div class="container-fluid">
		
		<a class="navbar-brand mx-4" href="index.php">
			<img src="images/auto.png" width="190" height="140" alt="" style="">
		</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="menu">
			<ul class="navbar-nav">

			  <li class="nav-item">
				<a class="nav-link <?= ($cp=='sobre')?'active':'' ?>" href="sobre.php">Sobre Nós</a>
			  </li>

			  <li class="nav-item">
				<a class="nav-link <?= ($cp=='viaturas')?'active':'' ?>" href="viaturas.php">Viaturas</a>
			  </li>

			  <li class="nav-item">
				<a class="nav-link <?= ($cp=='contactos')?'active':'' ?>" href="contactos.php">Contactos</a>
			  </li>

			</ul>

		</div>
		<div class="d-flex justify-content-end">
			
				<a href="admin/index.php" target="_blank" class="text-dark">
					<div class="d-flex">
						<div>login&nbsp;</div>
						<i class="fas fa-sign-in-alt mt-2 mr-5 "></i>
					</div>
				</a>
		</div>

	</div>
</nav>
