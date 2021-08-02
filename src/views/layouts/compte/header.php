<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>header</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/proyectocar/car/src/assets/css/reset.css">
    <link href="/proyectocar/car/src/assets/css/header.css" rel="stylesheet">
    <script>
        function click() {
            var a = document.getElementById('select_car').value;
            alert(a);
        }
    </script>
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
                        <a href="#">
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
                                <p>Deconection</p>
                            </div>
                        </a>
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
                    <a href="<?= $router->generate('addnewcar'); ?>">
                        <div class="row b-alert">
                            <img src="/proyectocar/car/src/assets/images/car.png" width="50" height="50" alt="">
                            <p>Ajouter un véhicule</p>
                        </div>
                    </a>

                </li>
                <li>
                    <a href="<?= $router->generate('editUser'); ?>">
                        <div class="row b-alert">
                            <img src="/proyectocar/car/src/assets/images/man.png" width="50" height="50" alt="">
                            <p>Données</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?= $router->generate('addinvoicecar'); ?>">
                        <div class="row b-alert">
                            <img src="/proyectocar/car/src/assets/images/facture3.png" width="50" height="50" alt="">
                            <p>Données</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?= $router->generate('editstacar'); ?>">
                        <div class="row b-alert">
                            <img src="/proyectocar/car/src/assets/images/statistic.png" width="50" height="50" alt="">
                            <p>Données</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?= $router->generate('addinvoicecar'); ?>">
                        <div class="row b-alert">
                            <img src="/proyectocar/car/src/assets/images/car.png" width="50" height="50" alt="">
                            <p>Données</p>
                        </div>
                    </a>

                </li>

            </ul>
            <div>

            </div>


        </div>




        <?= alertDisplay(); ?>