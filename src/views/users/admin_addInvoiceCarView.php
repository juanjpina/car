<?php get_header('InvoiceCar', 'compte') ?>
<div class="car">
    <div class="contained column">
        <div class="select column">
            <h3>Modifier les données de votre véhicule</h3>
        </div>
        <form action="" method="post">
            <div class="column">
                <ul>
                    <li>
                        <div class="columns">
                            <select name="select" id="select_car" onchange="click()">
                                <?php foreach ($cars as $car) { ?>
                                    <option value='<?= $car['id_car']; ?>'><?= $car['trademark']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </li>
                    <li>
                        <div class="column ">
                            <button type="submit">Ajoutez votre véhicule</button>
                        </div>
                    </li>
                </ul>
                <div>
                    <?php foreach ($trademark as $trade) { ?>
                        <p>Vous avez choise le véhicule <?= $trade['trademark'] ?></p>
                    <?php } ?>
                </div>
            </div>
        </form>
        <div class="column">
            <form action="" method="post">
                <ul>
                    <div class=" column">
                        <?php for ($i = 0; $i < count($types); $i++) { ?>
                            <li>
                                <p form='<?= $types[$i]['function']; ?>'><?= $types[$i]['type_data']; ?></p>
                                <div class="row">
                                    <?php switch ($types[$i]['function']) {
                                        case (1):
                                            foreach ($buy as $b) { ?>
                                                <div class="column">
                                                    <label for="date<?= $i + 1; ?> ">Date</label>
                                                    <input type="date" name='date<?= $i + 1 ?>' value="<?= $b['date'] ?>">
                                                </div>
                                                <div class="column">
                                                    <label for="km">Km</label>
                                                    <input type="number" name='km<?= $i + 1 ?>' value="<?= $b['km'] ?>">
                                                </div>
                                            <?php } ?>
                                            <?php break; ?>
                                            <?php
                                        case (2):
                                            foreach ($oil as $o) { ?>
                                                <div class="column">
                                                    <label for="date">Date</label>
                                                    <input type="date" name='date<?= $i + 1 ?> ' value="<?= $o['date'] ?>">
                                                </div>
                                                <div class="column">
                                                    <label for="km">Km</label>
                                                    <input type="number" name='km<?= $i + 1 ?>' value="<?= $o['km'] ?>">
                                                </div>
                                            <?php } ?>
                                            <?php break; ?>
                                            <?php
                                        case (3):
                                            foreach ($timing as $t) { ?>
                                                <div class="column">
                                                    <label for="date">Date</label>
                                                    <input type="date" name='date<?= $i + 1 ?> ' value="<?= $t['date']     ?>">
                                                </div>
                                                <div class="column">
                                                    <label for="km">Km</label>
                                                    <input type="number" name='km<?= $i + 1 ?>' value="<?= $t['km']     ?>">
                                                </div>
                                            <?php } ?>
                                            <?php break; ?>
                                            <?php
                                        case (4):
                                            foreach ($technical as $te) { ?>
                                                <div class="column">
                                                    <label for="date">Date</label>
                                                    <input type="date" name='date<?= $i + 1 ?> ' value="<?= $te['date']     ?>">
                                                </div>
                                                <div class="column">
                                                    <label for="km">Km</label>
                                                    <input type="number" name='km<?= $i + 1 ?>' value="<?= $te['km']     ?>">
                                                </div>
                                            <?php } ?>
                                            <?php break; ?>
                                            <?php
                                        case (5):
                                            foreach ($first as $f) { ?>
                                                <div class="column">
                                                    <label for="date">Date</label>
                                                    <input type="date" name='date<?= $i + 1 ?> ' value="<?= $f['date']     ?>">
                                                </div>
                                                <div class="column">
                                                    <label for="km">Km</label>
                                                    <input type="number" name='km<?= $i + 1 ?>' value="<?= $f['km']     ?>">
                                                </div>
                                            <?php } ?>
                                            <?php break; ?>
                                    <?php } //switch 
                                    ?>
                                </div>
                            </li>
                        <?php } ?>
                    </div>
                    <li>
                        <div class="column">
                            <button type="submit">Confirmez les données</button>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>