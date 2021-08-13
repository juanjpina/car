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
        <!-- <div class="column"> -->
        <ul>
            <form action="" method="post">
                <div class="column">
                    <li>
                        <div class="column">
                            <?php foreach ($buy as $b) { ?>
                                <p class='textTitleInput'>Information d'achat</p>
                                <div class='row'>
                                    <div class="column ">
                                        <label for="date1 ">Date</label>
                                        <input type="date" class='input' name='date1' value="<?= $b['date']; ?>">
                                    </div>
                                    <div class="column">
                                        <label for="km1">Km</label>
                                        <input type="number" class='input' name='km1' value="<?= $b['km']; ?>">
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class='column'>
                            <?php foreach ($first as $f) { ?>
                                <p class='textTitleInput'>Premier inmatriculation</p>
                                <div class='row'>
                                    <div class="column">
                                        <label for="date5">Date</label>
                                        <input type="date" class='input' name='date5' value="<?= $f['date']; ?>">
                                    </div>
                                    <div class="column">
                                        <label for="km5">Km</label>
                                        <input type="number" class='input' name='km5' value="<?= $f['km']; ?>">
                                    </div>
                                </div>
                            <?php }; ?>
                        </div>
                    </li>
                </div>
                <!-- </div> -->
                <li>
                    <div class="column">
                        <button type="submit" class="button">Confirmez les données</button>
                    </div>
                </li>
            </form>
        </ul>
        <!-- </div> -->
    </div>
</div>