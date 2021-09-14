<?php get_header('menu setting', 'admin'); ?>
<div class='menuSetting column'>
    <ul class="row">
        <li>
            <a href="<?= $router->generate('addnewcar'); ?>">
                <div class="b-alert">
                    <img src="/proyectocar/car/src/assets/images/car.png" width="30" height="30" alt="">
                    <p>Ajouter un véhicule</p>
                </div>
            </a>
        </li>
        <li>
            <a href="<?= $router->generate('maintenance'); ?>">
                <div class="b-alert">
                    <img src="/proyectocar/car/src/assets/images/motor2.png" width="50" height="37" alt="">
                    <p>Entretien</p>
                </div>
            </a>
        </li>
        <li>
            <a href="<?= $router->generate('editstacar'); ?>">
                <div class="b-alert">
                    <img src="/proyectocar/car/src/assets/images/statistic.png" width="30" height="30" alt="">
                    <p>Paramètres</p>
                </div>
            </a>
        </li>
        <li>
            <a href="<?= $router->generate('whiteadmin'); ?>">
                <div class="b-alert">
                    <img src="/proyectocar/car/src/assets/images/car.png" width="30" height="30" alt="">
                    <p>Sélectionner un véhicule</p>
                </div>
            </a>
        </li>
        <li>
            <a href="<?= $router->generate('fuel'); ?>">
                <div class="b-alert">
                    <img src="/proyectocar/car/src/assets/images/statistic.png" width="30" height="30" alt="">
                    <p>Carburant</p>
                </div>
            </a>
        </li>
    </ul>
</div>
<?php get_footer('admin');
