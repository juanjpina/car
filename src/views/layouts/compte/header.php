<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>header</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="/proyectocar/car/src/assets/css/reset.css"> -->
    <link href="/proyectocar/car/src/assets/css/main.css" rel="stylesheet">
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
                <p class="par"> Bonjour, M. Mme. <?php echo $_SESSION['auth']['nickname'];
                                                    if (isset($_SESSION['car']['trademark'])) {
                                                        echo "  Vous avez le véhicule " . $_SESSION['car']['trademark'];
                                                    } else {
                                                        echo '';
                                                    }; ?>
                </p>
            </div>
        </div>
    </header>
    <main>
        <div class="sidebarCompte">
            <ul>
                <li>
                    <a href="<?= $router->generate('whiteadmin'); ?>">
                        <div class="b-alert">
                            <img src="/proyectocar/car/src/assets/images/car.png" width="30" height="30" alt="">
                            <p>Accueil</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?= $router->generate('addinvoicecar'); ?>">
                        <div class="b-alert">
                            <img src="/proyectocar/car/src/assets/images/car.png" width="30" height="30" alt="">
                            <p>Information du véhicule</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?= $router->generate('editUser'); ?>">
                        <div class="b-alert">
                            <img src="/proyectocar/car/src/assets/images/man.png" width="30" height="30" alt="">
                            <p>Pseudo, Mot de passe</p>
                        </div>
                    </a>
                </li>










            </ul>
        </div>
        <!-- </div> -->
        <?= alertDisplay(); ?>