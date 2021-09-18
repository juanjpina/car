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
    <!-- <link rel="stylesheet" href="src/assets/css/reset.css"> -->
    <link rel="stylesheet" href=" src/assets/css/main.css">
    <style>
        .card-box {
            width: 150px;
            height: 200px;
            position: relative;
            perspective: 1000px;
            margin-right: 2em;
        }

        .card-box:hover .card {
            transform: rotateY(180deg);
        }

        img {
            border-radius: 15px;
        }

        .card {
            transform-style: preserve-3d;
            transition: all 1s linear;
        }

        .front {
            position: absolute;
            backface-visibility: hidden;
        }

        .front.back {
            transform: rotateY(180deg);
        }

        /* .container {
			display: flex;
			flex-direction: row;
			align-items: center;
			padding-top: 1.2em;
		}

		.wraper {
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		p {
			text-align: center;
		}

		.containerMain {
			margin-top: 10em;
		} */
    </style>
</head>

<body>
    <header class="header row">
        <div class="logo">
            <a href=""><img src="/proyectocar/car/src/assets/images/logo.png" width="200" height="150" alt=""></a>
        </div>
        <div class="conextion">
            <ul>
                <li><a href="<?= $router->generate('login') ?>">
                        <div class="button_admin">
                            <img src="/proyectocar/car/src/assets/images/man.png" width="35" height="35" alt="">
                            <p>Se connecter</p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </header>
    <main class="form-signin">
        <?= alertDisplay(); ?>