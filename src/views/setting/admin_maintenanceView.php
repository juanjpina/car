<?php get_header('InvoiceCar', 'admin') ?>
<div class="invoiceCar column">
    <div>
        <h1 class='title'>Le dernier entretien de votre véhicule</h1>
    </div>
    <div class="column">
        <!-- <form action="" method="post"> -->
        <ul>
            <li>
                <div class='column'>
                    <p class='textTitleInput'>Vidanges</p>
                    <?php foreach ($oil as $o) { ?>
                        <div class='row'>
                            <div class="column inputSpace">
                                <label for="date2">Date</label>
                                <p><?= $o['date']; ?></p>
                            </div>
                            <div class="column">
                                <label for="km2">Km</label>
                                <p><?= $o['km']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </li>
            <li>
                <div class='column'>
                    <p class='textTitleInput'>Courroie de distribution</p>
                    <?php foreach ($timing as $t) { ?>
                        <div class='row'>
                            <div class="column inputSpace">
                                <label for="date3">Date</label>
                                <p><?= $t['date']; ?></p>
                            </div>
                            <div class="column">
                                <label for="km3">Km</label>
                                <p><?= $t['km']; ?></p>
                            </div>
                        </div>
                </div>
            <?php } ?>
            </li>
            <li>
                <div class='column'>
                    <p class='textTitleInput'>Contrôle techinique</p>
                    <?php foreach ($technical as $te) { ?>
                        <div class='row'>
                            <div class="column inputSpace">
                                <label for="date4">Date</label>
                                <p><?= $te['date']; ?></p>
                            </div>
                            <div class="column">
                                <label for="km4">Km</label>
                                <p><?= $te['km']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </li>
            <!-- <li>
                    <div class="column">
                        <button type="submit" class="button">Confirmez les données</button>
                    </div>
                </li> -->
        </ul>
        <!-- </form> -->
    </div>
</div>
<?php get_footer('admin'); ?>