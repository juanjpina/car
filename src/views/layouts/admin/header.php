<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Se connecter</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap" rel="stylesheet">

	<!-- <link rel="stylesheet" href="/proyectocar/car/src/assets/css/reset.css"> -->
	<link href="/proyectocar/car/src/assets/css/main.css" rel="stylesheet">
	<!-- <script language="Javascript">
		console.log(45);

		var t = document.getElementsById('nom');
		t.addEventListerner('click', alerta());

		function alerta() {
			alert('Mi primer Script');
		}
	</script> -->
	<!-- <link type="text/css" rel="stylesheet" href="/proyectocar/car/src/assets/css/css.php" /> -->
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
						<a href="<?= $router->generate('editUser') ?>" id="as">
							<div class="button_admin">
								<img src="/proyectocar/car/src/assets/images/man.png" width="35" height="35" alt="">
								<p>Mon compte</p>
							</div>
						</a>
					</li>
					<li class="li_button">
						<a href="<?= $router->generate('logout') ?>">
							<div class="button_admin">
								<img src="/proyectocar/car/src/assets/images/disconnection.png" width="25" height="35" alt="">
								<p>Déconnexion</p>
							</div>
						</a>
					</li>
				</ul>
			</div>
			<div class="bonjour">
				<p class="par"> Bonjour, <?= $_SESSION['auth']['nickname']; ?> Votre véhicule <?= $_SESSION['car']['trademark']; ?></p>
			</div>
		</div>
	</header>
	<main class="">
		<div class="sidebarAdmin">
			<ul class="list">
				<li>
					<a href="<?= $router->generate('editalerts'); ?>">
						<div class="column b-alert border">
							<img src="/proyectocar/car/src/assets/images/alerts.png" width="50" height="50" alt="">
							<p>Rappel</p>
						</div>
					</a>
				</li>
				<li>
					<a href="<?= $router->generate('addInvoiceMenu'); ?>">
						<div class="column b-invoice border">
							<img src="/proyectocar/car/src/assets/images/facture3.png" width="50" height="50" alt="">
							<p>Factures</p>
						</div>
					</a>
				</li>
				<li>
					<a href="<?= $router->generate('menustatistics'); ?>">
						<div class="column b-statistic border">
							<img src="/proyectocar/car/src/assets/images/statistic.png" width="50" height="50" alt="">
							<p>Statistique</p>
						</div>
					</a>
				</li>
				<li>
					<a href="<?= $router->generate('addhistory'); ?>">
						<div class="column b-history border">
							<img src="/proyectocar/car/src/assets/images/history2.png" width="50" height="50" alt="">
							<p>Historique</p>
						</div>
					</a>
				</li>
			</ul>
		</div>
		<?= alertDisplay(); ?>