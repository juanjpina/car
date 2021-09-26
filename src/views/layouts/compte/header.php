<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agenda Voiture</title>
    <meta name="description" content="Agenda voiture">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap" rel="stylesheet">
    <link href="/proyectocar/car/src/assets/css/main.css" rel="stylesheet">
</head>

<body>
    <header class="header">
        <nav>
            <div class="row">
                <div class="logo">
                    <a href="#"><img src="/proyectocar/car/src/assets/images/logo.png" width="200" height="108" alt=""></a>
                </div>
                <div class="navegation">
                    <ul class="nave">
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
            <div class="sidebarCompte">
                <ul>
                    <li>
                        <a href="<?= $router->generate('white'); ?>">
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
            <?= alertDisplay(); ?>
        </nav>