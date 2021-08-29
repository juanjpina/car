<?php get_header('white', 'admin'); ?>
<div class='white-car column'>
    <form action="" method="post" class="column">
        <ul class="">
            <li>
                <select name='car' class="select">
                    <?php foreach ($cars as $car) { ?>
                        <option value="<?= $car['id_car'] ?>"><?= $car['trademark'] ?></option>
                    <?php } ?>
                </select>
            </li>
            <li>
                <div>
                    <input type="hidden" name="cars-ok" value='cars-ok'>
                    <button type='submit' class="button">sauvergarder</button>
                </div>
            </li>
        </ul>
    </form>
</div>
<?php get_footer('admin'); ?>