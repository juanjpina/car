<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Se connecter</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap" rel="stylesheet">
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="src/assets/css/reset.css">
	<link href="src/assets/css/header.css" rel="stylesheet">
</head>

<body>
	<header class="header ">
		<div class="admin">
			<div>
				Bonjour <?= $_SESSION['auth']['email']; ?>

			</div>
			<ul>
				<li>
					<div class="logo">
						<a href="">RDVoiture</a>
					</div>
				</li>
				<li class="li_button">
					<div class="button_admin">
						<img src="../../../assets/images/des.png" height="30px" width="30px" alt="">
						<a href="">Mon compte</a>
					</div>
				</li>
				<li class="li_button">
					<div class="button_admin">
						<img src="../../../assets/images/des.png" height="30px" width="30px" alt="">
						<a href="">Deconection</a>

					</div>
				</li>
			</ul>
		</div>




	</header>



	<main class="form-signin">
		<?= alertDisplay(); ?>