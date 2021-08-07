<?php get_header('InvoiceCar', 'compte') ?>
<div class="invoiceCar">
    <div class="containedCar column">
        <div class="column textTitle">
            <h3 class='h3Car'>Modifier les données de votre véhicule</h3>
        </div>
        <form action="" method="post">
            <div class="column">
                <ul>
                    <li>
                        <div class="column">
                            <select name="select" class='input selectCar' id="select_car" onchange="click()">
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
                        <?php for ($i = 0; $i < count($types); $i++) { ?>
                            <li>

                                <p class='textTitleInput'> <?= $types[$i]['type_data']; ?></p>
                                <div class="row">
                                    <?php switch ($types[$i]['function']) {
                                        case (1):
                                            foreach ($buy as $b) { ?>
                                                <div class="column inputSpace">
                                                    <label for="date<?= $i + 1; ?> ">Date</label>
                                                    <input type="date" class='input' name='date<?= $i + 1; ?>' value="<?= $b['date']; ?>">
                                                </div>
                                                <div class="column">
                                                    <label for="km<?= $i + 1; ?>">Km</label>
                                                    <input type="number" class='input' name='km<?= $i + 1; ?>' value="<?= $b['km']; ?>">
                                                </div>
                                            <?php } ?>
                                            <?php break; ?>
                                            <?php
                                        case (2):
                                            foreach ($oil as $o) { ?>
                                                <div class="column inputSpace">
                                                    <label for="date<?= $i + 1; ?>">Date</label>
                                                    <input type="date" class='input' name='date<?= $i + 1; ?>' value="<?= $o['date']; ?>">
                                                </div>
                                                <div class="column">
                                                    <label for="km<?= $i + 1; ?>">Km</label>
                                                    <input type="number" class='input' name='km<?= $i + 1; ?>' value="<?= $o['km']; ?>">
                                                </div>
                                            <?php } ?>
                                            <?php break; ?>
                                            <?php
                                        case (3):
                                            foreach ($timing as $t) { ?>
                                                <div class="column inputSpace">
                                                    <label for="date<?= $i + 1; ?>">Date</label>
                                                    <input type="date" class='input' name='date<?= $i + 1; ?>' value="<?= $t['date']; ?>">
                                                </div>
                                                <div class="column">
                                                    <label for="km<?= $i + 1; ?>">Km</label>
                                                    <input type="number" class='input' name='km<?= $i + 1; ?>' value="<?= $t['km']; ?>">
                                                </div>
                                            <?php } ?>
                                            <?php break; ?>
                                            <?php
                                        case (4):
                                            foreach ($technical as $te) { ?>
                                                <div class="column inputSpace">
                                                    <label for="date<?= $i + 1; ?>">Date</label>
                                                    <input type="date" class='input' name='date<?= $i + 1; ?>' value="<?= $te['date']; ?>">
                                                </div>
                                                <div class="column">
                                                    <label for="km<?= $i + 1; ?>">Km</label>
                                                    <input type="number" class='input' name='km<?= $i + 1 ?>' value="<?= $te['km']; ?>">
                                                </div>
                                            <?php } ?>
                                            <?php break; ?>
                                            <?php
                                        case (5):
                                            foreach ($first as $f) { ?>
                                                <div class="column">
                                                    <label for="date<?= $i + 1; ?>">Date</label>
                                                    <input type="date" class='input' name='date<?= $i + 1; ?>' value="<?= $f['date']; ?>">
                                                </div>
                                                <div class="column">
                                                    <label for="km<?= $i + 1; ?>">Km</label>
                                                    <input type="number" class='input' name='km<?= $i + 1; ?>' value="<?= $f['km']; ?>">
                                                </div>
                                            <?php } ?>
                                            <?php break; ?>
                                    <?php
                                        default;
                                    } //switch 
                                    ?>
                                </div>
                            </li>
                        <?php } ?>
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