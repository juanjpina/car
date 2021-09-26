<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agenda voiture</title>
	<meta name="description" content="Agenda voiture">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap" rel="stylesheet">
	<link href="/proyectocar/car/src/assets/css/main.css" rel="stylesheet">
</head>

<body>
	<header class="headerAdmin">
		<nav>
			<div class="row">
				<div class="logos">
					<a href="#"><img src="/proyectocar/car/src/assets/images/logo.png" width="200" height="108" alt=""></a>
				</div>
				<div class="navegation">
					<ul class="nave row">
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
									<img class="disconnection" src="/proyectocar/car/src/assets/images/disconnection.png" width="25" height="35" alt="">
									<p>Déconnexion</p>
								</div>
							</a>
						</li>
					</ul>
					<div class="bonjour">
						<p class="par"> Bonjour, M. Mme. <?php echo $_SESSION['auth']['nickname']; ?></p>
						<p class="par"> <?php if (isset($_SESSION['car']['trademark'])) {
											echo "  Vous avez le véhicule " . $_SESSION['car']['trademark'];
										} else {
											echo '';
										}; ?></p>
					</div>
				</div>
			</div>
		</nav>
	</header>
	<main>
		<nav>
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
						<a href="<?= $router->generate('menustatistics'); ?>">
							<div class="column b-statistic border">
								<img src="/proyectocar/car/src/assets/images/statistic.png" width="50" height="50" alt="">
								<p>Statistique</p>
							</div>
						</a>
					</li>
					<li>
						<a href="<?= $router->generate('addInvoiceMenu'); ?>">
							<div class="column b-invoice border">
								<img src="/proyectocar/car/src/assets/images/facture3.png" width="50" height="50" alt="">
								<p>Frais</p>
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
					<li>
						<a href="<?= $router->generate('settingmenu'); ?>">
							<div class="column b-setting border">
								<img src="/proyectocar/car/src/assets/images/history2.png" width="50" height="50" alt="">
								<p>setting</p>
							</div>
						</a>
					</li>
				</ul>
			</div>
			<!-- <?= alertDisplay(); ?> -->
		</nav>