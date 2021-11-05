<?php get_header('InvoiceCar', 'compte') ?>
<section>
    <div class="invoiceCar">
        <div class="column">
            <h1 class='title'>Les premières données du véhicule</h1>
        </div>
        <div class="column">
            <form action="" method="post">
                <div class="column">
                    <div>
                        <div class="column">
                            <?php foreach ($getCars as $car) { ?>
                                <h6>Information au moment de l'achat</h6>
                                <div class='row'>
                                    <div class="column date">
                                        <label for="buydate ">Date</label>
                                        <input type="date" class='input' name='buydate' value="<?= $car['buyDate'];  ?>">
                                    </div>
                                    <div class="column">
                                        <label for="buykm">Km</label>
                                        <input type="number" class='input' name='buykm' placeholder='<?= $car['buykm']; ?>' value="">
                                    </div>
                                </div>
                        </div>
                        <div class='column'>
                            <h6>La première immatriculation</h6>
                            <div class='row'>
                                <div class="column date">
                                    <label for="firstdate">Date</label>
                                    <input type="date" class='input' name='firstdate' value="<?= $car['firstDate']; ?>">
                                </div>
                                <div class="column">
                                    <label for="firstkm">Km</label>
                                    <input type="number" class='input' name='firstkm' placeholder="<?= $car['firstKm']; ?>" value="">
                                </div>
                            </div>
                        <?php }; ?>
                        </div>
                    </div>
                </div>
                <div class="submit">
                    <div class="column">
                        <input type="hidden" name="ok" value="ok">
                        <button type="submit" class="button">Sauvegarder</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php get_footer('compte'); ?>