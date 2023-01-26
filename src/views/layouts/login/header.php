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
	<link rel="stylesheet" href=" src/assets/css/main.css">

</head>

<body>
	<header class="header">
		<nav>
			<div class="logo">
				<a href="<?= $router->generate('home'); ?>"><img src="/src/assets/images/car2.png" width="200" height="90" alt="Agenda voiture"></a>
				<p>Agenda voiture</p>

			</div>
		</nav>
	</header>
	<main class="form-signin">