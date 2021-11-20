<?php get_header('white', 'admin'); ?>
<section>
    <div class='select-car'>
        <a class="closed" href="<?= $router->generate('white') ?>"><img src="/car/src/assets/images/closed.png" width="25" height="25" title="Fermer" alt="Fermer"></a>
        <div class="column">
            <h1 class="title">Sélectionnez votre véhicule</h1>
        </div>
        <div class="row">
            <div class="column">
                <form action="" method="post">
                    <div>
                        <p>Liste de véhicules</p>
                        <select name='car' class="select">
                            <?php foreach ($cars as $car) { ?>
                                <option value="<?= $car['id_car'] ?>"><?= $car['trademark'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div>
                        <input type="hidden" name="cars-ok" value='cars-ok'>
                        <button type='submit' class="button">Seleccionnez un véhicule</button>
                    </div>
                </form>
            </div>
            <div>
                <p>La voiture préférée</p>
            </div>
        </div>
    </div>
</section>
<?php get_footer('admin'); ?>