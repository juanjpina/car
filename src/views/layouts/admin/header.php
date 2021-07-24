<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Se connecter</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="/proyectocar/car/src/assets/css/reset.css">

	<link href="/proyectocar/car/src/assets/css/invoice.css" rel="stylesheet">
	<link href="/proyectocar/car/src/assets/css/header.css" rel="stylesheet">
</head>

<body>
	<header class="header">
		<div class="admin">
			<div class="logo">
				<a href="#">RDVoiture</a>
			</div>

			<div class="navegation">
				<ul class="nave">
					<li class="li_button">

						<div class="button_admin">
							<img src="/proyectocar/car/src/assets/images/man.png" width="35" height="35" alt="">
							<a href="">Mon compte</a>
						</div>
					</li>
					<li class=" li_button">
						<div class="button_admin">
							<img src="/proyectocar/car/src/assets/images/disconnection.png" width="25" height="35" alt="">
							<a href="<?= $router->generate('logout') ?>">Deconection</a>
						</div>
					</li>
				</ul>
			</div>
			<div class="bonjour">
				<p> Bonjour, <?= $_SESSION['auth']['nickname']; ?></p>
			</div>
		</div>
	</header>
	<main class="">

		<div class="sidebar">
			<ul class="list">
				<li>
					<div class="row alert">
						<img src="/proyectocar/car/src/assets/images/alerts.png" width="50" height="50" alt="">

						<p>Rappel</p>
					</div>
				</li>
				<li>
					<div class="row invoice">
						<img src="/proyectocar/car/src/assets/images/facture3.png" width="50" height="50" alt="">
						<p>Factures</p>
					</div>
				</li>
				<li>
					<div class="row statistic">
						<img src="/proyectocar/car/src/assets/images/statistic.png" width="50" height="50" alt="">
						<p>Statistique</p>
					</div>
				</li>
				<li>
					<div class="row history">
						<img src="/proyectocar/car/src/assets/images/history2.png" width="50" height="50" alt="">
						<p>Historique</p>
					</div>

				</li>

			</ul>
			<div>

			</div>


		</div>




		<?= alertDisplay(); ?>