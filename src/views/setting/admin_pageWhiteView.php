<?php get_header('white', 'admin'); ?>
<div class='white-car column'>
    <h1 class="title">Sélectionnez votre véhicule</h1>
    <form action="" method="post">
        <ul>
            <li>
                <div>
                    <select name='car' class="select">
                        <?php foreach ($cars as $car) { ?>
                            <option value="<?= $car['id_car'] ?>"><?= $car['trademark'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </li>
            <li>
                <div>
                    <input type="hidden" name="cars-ok" value='cars-ok'>
                    <button type='submit' class="button">Sauvergarder</button>
                </div>
            </li>
        </ul>
    </form>
</div>
<?php get_footer('admin'); ?>