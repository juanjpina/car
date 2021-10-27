<?php get_header('white', 'admin'); ?>
<section>
    <div class='select-car'>
        <div class="column">
            <h1 class="title">Sélectionnez votre véhicule</h1>
        </div>
        <div class="row">
            <div class="column">
                <form action="" method="post">
                    <div>
                        <select name='car' class="select">
                            <?php foreach ($cars as $car) { ?>
                                <option value="<?= $car['id_car'] ?>"><?= $car['trademark'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div>
                        <input type="hidden" name="cars-ok" value='cars-ok'>
                        <button type='submit' class="button">Sauvegarder</button>
                    </div>
                </form>
            </div>
            <div>
                <p>La voiture préférée</p>
            </div>
        </div>
    </div>
</section>
<?php get_footer('admin'); ?>