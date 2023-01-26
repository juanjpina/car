<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agenda voiture</title>
	<link rel="shortcut icon" href="/car/src/assets/images/favicon.png">
	<meta name="description" content="C’est une application web où nous serons en mesure de gérer l’entretien de notre voiture, les dépenses de base, les consommations de carburant, rappels des différents entretien de la voiture, recevoir des e-mails avec les prochaines opérations à réaliser à la voiture.
">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap" rel="stylesheet">
	<link href="/car/src/assets/css/main.css" rel="stylesheet">
</head>

<body>
	<header class="headerAdmin">
		<nav>
			<div class="deconection">
				<ul>
					<li class="li_button">
						<a href="<?= $router->generate('logout') ?>">
							<div class="">
								<img class="disconnection" title="Déconnecter" src="/car/src/assets/images/deconection.png" width="25" height="25" alt="Déconnexion">

							</div>
						</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="logos">
					<a href="<?= $router->generate('whiteHome'); ?>"><img src="/car/src/assets/images/car2.png" width="200" height="90" alt="logo"></a>
				</div>
				<div class="navegation">
					<ul class="nave row">
						<li class="li-user">
							<a href="<?= $router->generate('editUser') ?>" id="as">
								<div class="div-img">
									<img title="Mon compte" src="/car/src/assets/images/man.png" width="35" height="35" alt="mon compte">

								</div>
							</a>
						</li>
						<li>
							<div class="bonjour">
								<p class="par">Bonjour, M. Mme. <?php echo $_SESSION['auth']['nickname']; ?></p>
								<p class="par"><?php if (isset($_SESSION['car']['trademark'])) {
													echo "Le véhicule " . $_SESSION['car']['trademark'];
												} else {
													echo '';
												}; ?></p>
							</div>
						</li>
					</ul>
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
								<img src="/car/src/assets/images/alerts.png" width="50" height="50" alt="rappel">
								<p>Rappel</p>
							</div>
						</a>
					</li>
					<li>
						<a href="<?= $router->generate('menustatistics'); ?>">
							<div class="column b-statistic border">
								<img src="/car/src/assets/images/statistic.png" width="50" height="50" alt="statistique">
								<p>Statistique</p>
							</div>
						</a>
					</li>
					<li>
						<a href="<?= $router->generate('addInvoiceMenu'); ?>">
							<div class="column b-invoice border">
								<img src="/car/src/assets/images/facture3.png" width="50" height="50" alt="frais">
								<p>Frais</p>
							</div>
						</a>
					</li>
					<li>
						<a href="<?= $router->generate('addhistory'); ?>">
							<div class="column b-history border">
								<img src="/car/src/assets/images/history.png" width="50" height="50" alt="historique">
								<p>Historique</p>
							</div>
						</a>
					</li>
					<li>
						<a href="<?= $router->generate('settingmenu'); ?>">
							<div class="column b-setting border">
								<img src="/car/src/assets/images/carAdmin.png" width="50" height="50" alt="véhicule">
								<p>Véhicule</p>
							</div>
						</a>
					</li>
				</ul>
			</div>
			<?= alertDisplay(); ?>
		</nav>