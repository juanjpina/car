<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agenda voiture</title>
	<link rel="shortcut icon" href="/src/assets/images/favicon2.png">
	<meta name="description" content="C’est une application web où nous serons en mesure de gérer l’entretien de notre voiture, les dépenses de base, les consommations de carburant, rappels des différents entretien de la voiture, recevoir des e-mails avec les prochaines opérations à réaliser à la voiture.
">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap" rel="stylesheet">
	<link href="/src/assets/css/main.css" rel="stylesheet">
</head>

<body>
	<header class="headerAdmin">
		<nav>
			<div class="deconection">
				<ul>
					<li class="li_button">
						<a href="<?= $router->generate('logout') ?>">
							<div class="">
								<img class="disconnection" title="Déconnecter" src="/src/assets/images/deconection.png" width="25" height="25" alt="Déconnexion">

							</div>
						</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="logos">
					<a href="<?= $router->generate('whiteHome'); ?>"><img src="/src/assets/images/car2.png" width="200" height="90" alt="logo"></a>
				</div>
				<div class="navegation">
					<ul class="nave row">
						<li class="li-user">
							<a href="<?= $router->generate('editUser') ?>" id="as">
								<div class="div-img">
									<img title="Mon compte" src="/src/assets/images/man.png" width="35" height="35" alt="mon compte">

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
				<ul>
					<p>Rappel</p>
					<li>
						<a href="<?= $router->generate('editalerts'); ?>">
							<div class="column b-alert border">
								<img src="/src/assets/images/alerts.png" width="25" height="25" alt="rappel" title="Rappel	">
							</div>
						</a>
					</li>
				</ul>
				<ul>
					<p>Statistique</p>
					<li>
						<a href="<?= $router->generate('addstatistics'); ?>">
							<div class="column b-statistic border">
								<img src="/src/assets/images/calendar.png" width="25" height="25" alt="periodes" title="Périodes">
							</div>
						</a>

					</li>
					<li>
						<a href="<?= $router->generate('menugraphics'); ?>">
							<div class="column b-statistic border">
								<img src="/src/assets/images/statistic.png" width="25" height="25" alt="graphiques" title="Graphiques">
							</div>
						</a>

					</li>
				</ul>
				<ul>
					<li>
						<a href="<?= $router->generate('menutotalstatistics'); ?>">
							<div class="column b-statistic border">
								<img src="/src/assets/images/sums.png" width="25" height="25" alt="sommes" title="Sommes">
							</div>
						</a>

					</li>
					<li>
						<a href="<?= $router->generate('fuelstatistics'); ?>">
							<div class="column b-statistic border">
								<img src="/src/assets/images/fuel.png" width="25" height="25" alt="fuel" title="Carburant">
							</div>
						</a>

					</li>
				</ul>
				<ul>
					<p>Frais</p>
					<li>
						<a href="<?= $router->generate('addInvoice'); ?>">
							<div class="column b-invoice border">
								<img src="/src/assets/images/facture3.png" width="25" height="25" alt="ajouter" title="Ajouter">
							</div>
						</a>
					</li>
					<li>

						<a href="<?= $router->generate('editInvoice'); ?>">
							<div class="column b-invoice border">
								<img src="/src/assets/images/edit.png" width="25" height="25" alt="modifier" title="Modifier">
							</div>
						</a>
					</li>
				</ul>
				<ul>

					<p>Historique</p>
					<li>
						<a href="<?= $router->generate('addhistory'); ?>">
							<div class="column b-history border">
								<img src="/src/assets/images/history.png" width="25" height="25" alt="historique" title="Historique">
							</div>
						</a>
					</li>
				</ul>
				<ul>
					<p>Véhicule</p>
					<li>
						<a href="<?= $router->generate('addnewcar'); ?>">
							<div class="column b-setting border">
								<img src="/src/assets/images/newCar.png" width="25" height="25" alt="ajouter" title="Ajouter">
							</div>
						</a>
					</li>
					<li>
						<a href="<?= $router->generate('maintenance'); ?>">
							<div class="column b-setting border">
								<img src="/src/assets/images/motor2.png" width="25" height="25" alt="entretien" title="Entretien">
							</div>
						</a>
					</li>
				</ul>
				<ul>
					<li>
						<a href="<?= $router->generate('editstacar'); ?>">
							<div class="column b-setting border">
								<img src="/src/assets/images/statistic.png" width="25" height="25" alt="parameteres" title="Paramètres">
							</div>
						</a>
					</li>
					<li>
						<a href="<?= $router->generate('selectcar'); ?>">
							<div class="column b-setting border">
								<img src="/src/assets/images/car.png" width="25" height="25" alt="selectionner" title="Sélectionner">
							</div>
						</a>
					</li>
					<ul class="submenu">
						<li>
							<a href="<?= $router->generate('fuel'); ?>">
								<div class="column b-setting border">
									<img src="/src/assets/images/fuel.png" width="25" height="25" alt="carburant" title="Carburant">
								</div>
							</a>
						</li>
					</ul>

			</div>
			<?= alertDisplay(); ?>
		</nav>