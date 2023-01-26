<?php get_header('menu setting', 'admin'); ?>
<section>
    <div class='menuSetting'>
        <div class="row">
            <div>
                <a href="<?= $router->generate('addnewcar'); ?>">
                    <div class="b-alert">
                        <img class="img30" src="/car/src/assets/images/car.png" width="30" height="30" alt="">
                        <p>Ajouter un véhicule</p>
                    </div>
                </a>
            </div>
            <div>
                <a href="<?= $router->generate('maintenance'); ?>">
                    <div class="b-alert">
                        <img class="img50" src="/car/src/assets/images/motor2.png" width="50" height="37" alt="">
                        <p>Entretien</p>
                    </div>
                </a>
            </div>
            <div>
                <a href="<?= $router->generate('editstacar'); ?>">
                    <div class="b-alert">
                        <img class="img30" src="/car/src/assets/images/statistic.png" width="30" height="30" alt="">
                        <p>Paramètres</p>
                    </div>
                </a>
            </div>
            <div>
                <a href="<?= $router->generate('selectcar'); ?>">
                    <div class="b-alert">
                        <img class="img30" src="/car/src/assets/images/car.png" width="30" height="30" alt="">
                        <p>Sélectionner un véhicule</p>
                    </div>
                </a>
            </div>
            <div>
                <a href="<?= $router->generate('fuel'); ?>">
                    <div class="b-alert">
                        <img class="img40" src="/car/src/assets/images/carburant.png" width="40" height="40" alt="">
                        <p>Carburant</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<?php get_footer('admin');
