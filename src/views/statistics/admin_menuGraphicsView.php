<?php get_header('menu totales', 'admin') ?>
<div class="statistics">
    <div class="contained column">
        <h1 class='title'>Statistique</h1>
        <form action="" method="post">
            <ul class="column">
                <!-- <li>
                    <div class="column">
                        <h3>Véhicule</h3>
                        <select name="car" class='select'>
                            <?php foreach ($cars as $car) { ?>
                                <option value="<?= $car['id_car'] ?>"><?= $car['trademark'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </li> -->
                <div class="column width">
                    <li>
                        <div class="column">
                            <label for="startYear">De l'année</label>
                            <input type="number" name="startYear" class="input">
                        </div>
                    </li>
                    <li>
                        <div class="column">
                            <label for="endYear">À l'année</label>
                            <input type="number" name="endYear" class="input">
                        </div>
                    </li>
                </div>
                <li>
                    <div class="column">
                        <input type='hidden' name="ok" value="ok">
                        <button class='button' type="submit">Sauvegarder</button>
                    </div>
                </li>
            </ul>
        </form>
    </div>
</div>
<?php get_footer('admin') ?>