<?php get_header('feul', 'admin'); ?>
<section>
    <div class='fuel'>
    <a class="closed" href="<?= $router->generate('white') ?>"><img src="/car/src/assets/images/closed.png" width="25" height="25" title="Fermer" alt="Fermer"></a>
        <div class="column">
            <h1 class="title">Carburant</h1>
            <h6>Signalez le kilometrage à partir duquel vous voulez commencer le suivi.</h6>
        </div>
        <div class="column">
            <form action="" method="post">
                <div class="column">
                    <label for='km'>KM</label>
                    <?php foreach ($fuel as $ful) { ?>
                        <input type="number" name='km' value="" placeholder="<?= $ful['km'] ?>">
                    <?php } ?>
                </div>
                <div>
                    <button class="button" type="submit">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php get_footer('admin'); ?>