<?php get_header('edit statistics', 'admin'); ?>
<div class="userStatistics">
    <div class="column">
        <h1 class='title'>Prévision des modifications</h1>
        <h6>Choisissez une année ou kilométrage pour la prochaine modification</h6>
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

<?php get_footer('admin'); ?>