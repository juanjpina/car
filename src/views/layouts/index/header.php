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
    <style>
        .card-box {
            width: 100px;
            height: 133px;
            position: relative;
            perspective: 1000px;
            margin: 0.2em 2em;
        }

        @media only screen and (max-width:768px) {
            .card-box {
                width: 90px;
                height: 150px;
                margin: 0 1em;
            }

            img {
                width: 100px;
                height: 133px;
            }
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

        .containerMain {
            padding: 0px 20px;
            margin-top: 10em;
        }

        */
    </style>
</head>

<body>
    <header class="header">
        <nav class="index">
            <div class="row">
                <div class="logo column">
                    <a href="#"><img class="logos" src="/src/assets/images/car2.png" width="200" height="90" alt="Agenda voiture"></a>
                    <p>Agenda voiture</p>
                </div>
                <div class="navegation column ">
                    <ul class="nave">
                        <li class="li_button">
                            <a href="<?= $router->generate('login') ?>" id="as">
                                <!-- <div class="button_admin"> -->
                                <div class="buttonA">
                                    <img src="/src/assets/images/man.png" width="35" height="35" alt="se connecter">
                                    <p>Se connecter</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="form-signin">
        <?= alertDisplay(); ?>