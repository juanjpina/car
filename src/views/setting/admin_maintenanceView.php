<?php get_header('InvoiceCar', 'admin') ?>
<section>
    <div class="maintenance">
        <a class="closed" href="<?= $router->generate('white') ?>"><img src="/src/assets/images/closed.png" width="25" height="25" title="Fermer" alt="Fermer"></a>
        <div class="column">
            <h1 class='title'>Le dernier entretien de votre véhicule</h1>
            <h6>Voici les dernières modifications du véhicule</h6>
        </div>
        <div class="column">
            <div class='column'>
                <p class='textTitleInput'>Vidanges</p>
                <?php foreach ($oil as $o) { ?>
                    <div class='row'>
                        <div class="column inputSpace">
                            <label for="date2">Date</label>
                            <p><?= date("d-m-Y", strtotime($o['date'])); ?></p>
                        </div>
                        <div class="column">
                            <label for="km2">Km</label>
                            <p><?= $o['km']; ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class='column'>
                <p class='textTitleInput'>Courroie de distribution</p>
                <?php foreach ($timing as $t) { ?>
                    <div class='row'>
                        <div class="column inputSpace">
                            <label for="date3">Date</label>
                            <p><?= date("d-m-Y", strtotime($t['date'])); ?></p>
                        </div>
                        <div class="column">
                            <label for="km3">Km</label>
                            <p><?= $t['km']; ?></p>
                        </div>
                    </div>
            </div>
        <?php } ?>
        <div class='column'>
            <p class='textTitleInput'>Contrôle technique</p>
            <?php foreach ($technical as $te) { ?>
                <div class='row'>
                    <div class="column inputSpace">
                        <label for="date4">Date</label>
                        <p><?= date("d-m-Y", strtotime($te['date'])); ?></p>
                    </div>
                    <div class="column">
                        <label for="km4">Km</label>
                        <p><?= $te['km']; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
        </div>
    </div>
</section>
<?php get_footer('admin'); ?>