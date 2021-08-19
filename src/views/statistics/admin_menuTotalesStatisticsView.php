<?php get_header('menu totales', 'admin') ?>
<div class="statistics">
    <div class="contained column">
        <h1 class='title'>Statistique</h1>
        <form action="" method="post">
            <ul>
                <li>
                    <div class="column">
                        <h3>Véhicule</h3>
                        <select name="car" class='select'>
                            <?php foreach ($cars as $car) { ?>
                                <option value="<?= $car['id_car'] ?>"><?= $car['trademark'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </li>
                <div class="column">
                    <li>
                        <div class="column">
                            <label for="an">L'an</label>
                            <input type="number" name="an">
                        </div>
                </div>
                </li>
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