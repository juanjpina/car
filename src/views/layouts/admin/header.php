<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Se connecter</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="src/assets/css/reset.css">

	<link href="src/assets/css/header.css" rel="stylesheet">
</head>

<body>
	<header class="header ">
		<div>
			<p>Bonjour <?= $_SESSION['auth']['email']; ?></p>
		</div>
		<div class="admin">
			<div class="logo">
				<a href="">RDVoiture</a>
			</div>
			<div class="navegation">
				<ul class="nave">
					<li class="li_button">
						<div class="bonjour">
						</div>
						<div class="button_admin">

							<a href="">Mon compte</a>
						</div>
					</li>
					<li class="li_button">
						<div class="button_admin">

							<a href="">Deconection</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</header>
	<main class="form-signin">
		<?= alertDisplay(); ?>