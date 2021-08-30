<?php get_header('InvoiceCar', 'admin') ?>
<div class="invoiceCar column">
    <div class="containedCar column">
        <div class="column">
            <h1 class='title'>Le dernier entretien de votre véhicule</h1>
        </div>
        <form action="" method="post">
            <div class="column selectCar">
                <ul>
                    <li>
                        <div class="column">
                            <select name="select" class='select' id="select_car" onchange="click()">
                                <?php foreach ($cars as $car) { ?>
                                    <option value='<?= $car['id_car']; ?>'><?= $car['trademark']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </li>
                    <li>
                        <div class="column selectCar">
                            <button type="submit" class="button">Ajoutez votre véhicule</button>
                        </div>
                    </li>
                </ul>
                <div>
                    <?php foreach ($trademark as $trade) { ?>
                        <p class="trademark">Vous avez choisie le véhicule <?= $trade['trademark']; ?></p>
                    <?php }; ?>
                </div>
            </div>
        </form>
        <div class="column">
            <form action="" method="post">
                <ul>
                    <div class="column">
                        <li>
                            <div class="column">
                                <div class='column'>
                                    <p class='textTitleInput'>Vidanges</p>
                                    <?php foreach ($oil as $o) { ?>
                                        <div class='row'>
                                            <div class="column inputSpace">
                                                <label for="date2">Date</label>
                                                <input type="date" class='input' name='date2' value="<?= $o['date']; ?>">
                                            </div>
                                            <div class="column">
                                                <label for="km2">Km</label>
                                                <input type="number" class='input' name='km2' value="<?= $o['km']; ?>">
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
                                                <input type="date" class='input' name='date3' value="<?= $t['date']; ?>">
                                            </div>
                                            <div class="column">
                                                <label for="km3">Km</label>
                                                <input type="number" class='input' name='km3' value="<?= $t['km']; ?>">
                                            </div>
                                        </div>
                                </div>
                            <?php } ?>
                            <div class='column'>
                                <p class='textTitleInput'>Contrôle techinique</p>
                                <?php foreach ($technical as $te) { ?>
                                    <div class='row'>
                                        <div class="column inputSpace">
                                            <label for="date4">Date</label>
                                            <input type="date" class='input' name='date4' value="<?= $te['date']; ?>">
                                        </div>
                                        <div class="column">
                                            <label for="km4">Km</label>
                                            <input type="number" class='input' name='km4' value="<?= $te['km']; ?>">
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            </div>
                        </li>
                    </div>
                    <li>
                        <div class="column buttonSubmit">
                            <button type="submit" class="button">Confirmez les données</button>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>