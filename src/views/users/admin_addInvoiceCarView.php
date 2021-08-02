<?php get_header('InvoiceCar', 'compte') ?>
<div class="car">
    <div class="contained">
        <div class="select column">
            <h3>Modifier les données de votre véhicule</h3>
        </div>
        <form action="" method="post">
            <div class="column">
                <ul>
                    <li>
                        <div class="periode column">
                            <select name="select" id="select_car" onchange="click()">
                                <?php foreach ($cars as $car) { ?>
                                    <option value='<?= $car['id_car']; ?>'><?= $car['trademark']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="column">
                            <button type="submit">Confirmer</button>
                        </div>
                    </li>
                </ul>
        </form>
        <form action="" method="post">
            <ul>
                <li>
                    <div class="periode column">
                        <!-- <select name="select"> -->
                        <?php foreach ($types as $type) { ?>
                            <label form='<?= $type['function']; ?>'><?= $type['type_data']; ?></label>

                            <div class="row">
                <li>
                    <div class="column">
                        <label for="date">Date</label>
                        <input type="date" name='date' value="">
                    </div>
                </li>
                <li>
                    <div class="column">
                        <label for="km">Km</label>
                        <input type="number" name='km' value="">
                    </div>
                </li>
    </div>
<?php } ?>
<!-- </select> -->
</li>

</div>
<li>
    <div class="column">
        <button type="submit">Confirmer</button>
    </div>
</li>
</ul>
</form>
</div>
</div>