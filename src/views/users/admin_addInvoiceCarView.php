<?php get_header('InvoiceCar', 'compte') ?>
<div class="invoiceCar">
    <div class="containedCar column">
        <div class="column">
            <h1 class='title'>Les premières données du véhicule</h1>
        </div>
        <form action="" method="post">
            <ul>
                <div class="column selectCar">
                    <!-- <li>
                        <div class="column">
                            <select name="select" class='select' id="selectCar" onchange="click()">
                                <?php foreach ($cars as $car) { ?>
                                    <option value='<?= $car['id_car']; ?>'><?= $car['trademark']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="column">
                            <button type="submit" class="button">Ajoutez votre véhicule</button>
                        </div>
                    </li>
                    <li>
                        <div>
                            <?php foreach ($trademark as $trade) { ?>
                                <p class="trademark">Vous avez choisie le véhicule <?= $trade['trademark']; ?></p>
                            <?php }; ?>
                        </div>
                    </li> -->
                </div>
            </ul>
        </form>
        <!-- <div class="column"> -->
        <ul>
            <form action="" method="post">
                <div class="column">
                    <li>
                        <div class="column info">
                            <?php foreach ($buy as $b) { ?>
                                <p class='textTitleInput'>Information au moment de l'achat</p>
                                <div class='row'>
                                    <div class="column date">
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
                                <p class='textTitleInput'>La première immatriculation</p>
                                <div class='row'>
                                    <div class="column date">
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
                <li class="submit">
                    <div class="column">
                        <button type="submit" class="button">Confirmez les données</button>
                    </div>
                </li>
            </form>
        </ul>
        <!-- </div> -->
    </div>
</div>