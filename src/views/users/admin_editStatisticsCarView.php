<?php get_header('edit statistics', 'compte'); ?>
<div class="userStatistics column">
    <div class="column">
        <div class="column">
            <h1 class='title'>Modifier votre données</h1>
        </div>
        <form action="" method="post">
            <ul>
                <li class="liStatis">
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
                <li>
                    <div>
                        <?php foreach ($trademark as $trade) { ?>
                            <p class="trademark">Vous avez choisie le véhicule <?= $trade['trademark']; ?></p>
                        <?php }; ?>
                    </div>
                </li>
            </ul>
        </form>

        <form action="" method="post">
            <ul>
                <?php foreach ($setting as $set) { ?>
                    <li class="liStatis">
                        <p>Quand il faut changer la courrois de distribution</p>
                        <div class="row">
                            <div class="column right">
                                <label for="dateTiming">Années</label>
                                <input type="number" class="input" name="dateTiming" value="<?= $set['timingbeltDate'] ?>">
                            </div>
                            <div class="column">
                                <label for="kmTiming">Km</label>
                                <input type="number" class='input' name="kmTiming" value="<?= $set['timingbeltKm'] ?>">
                            </div>
                        </div>
                    </li>
                    <li class="liStatis">
                        <div class="column">
                            <div class="column">
                                <p>Quand il faut faire la vidange</p>
                            </div>
                            <div class="column">
                                <label for="kmOil">Km</label>
                                <input class="input" type="number" name="kmOil" value="<?= $set['oilchanges'] ?>">
                            </div>
                        </div>
                    </li>
                    <li class="liStatis ">
                        <div class="column ">
                            <button class='button buttonStatis' type="submit">Confirmer</button>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </form>
    </div>
</div>

<?php get_footer('compte'); ?>