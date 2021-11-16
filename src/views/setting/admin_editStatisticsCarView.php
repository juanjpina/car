<?php get_header('edit statistics', 'admin'); ?>
<section>
    <div class="userStatistics">
    <a class="closed" href="<?= $router->generate('white') ?>"><img src="/car/src/assets/images/closed.png" width="25" height="25" title="Fermer" alt="Fermer"></a>
        <div class="column">
            <h1 class='title'>Prévision des modifications</h1>
            <h6>Choisissez le nombre d'années ou kilométrage pour la prochaine modification</h6>
        </div>
        <div class="column">
            <form action="" method="post">
                <?php foreach ($setting as $set) { ?>
                    <div class="liStatis column">
                        <p>La courroie de distribution</p>
                        <div class="row">
                            <div class="column right">
                                <label for="dateTiming">Années</label>
                                <input type="number" class="input" name="dateTiming" value="<?= $set['timingbeltDate'] ?>">
                            </div>
                            <div class="column right">
                                <label for="kmTiming">Km</label>
                                <input type="number" class='input' name="kmTiming" value="<?= $set['timingbeltKm'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="liStatis">
                        <div class="column">
                            <p>La vidange</p>
                            <div class="column">
                                <label for="kmOil">Km</label>
                                <input class="input" type="number" name="kmOil" value="<?= $set['oilchanges'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="liStatis ">
                        <div class="column ">
                            <button class='button buttonStatis' type="submit">Confirmer</button>
                        </div>
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>
</section>
<?php get_footer('admin'); ?>