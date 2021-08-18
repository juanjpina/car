<?php get_header('statistics add', 'admin'); ?>

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
                    <!-- <li>
                        <div class="column">
                            <select name="invoice" class='select'>
                                <?php foreach ($invoices as $invoice) { ?>
                                    <option value="<?= $invoice['invoice'] ?>"><?= $invoice['type'] ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                    </li> -->
                    <li>
                        <div class='row dates'>
                            <div class="column period">
                                <h3>Périodes</h3>
                                <select name="period" class='select'>
                                    <option value="0">Périodes</option>
                                    <option value="1">Un dernier mois</option>
                                    <option value="3">Trois dernier mois</option>
                                    <option value="6">Six dernier mois</option>
                                    <option value="9">Neuf dernier mois</option>
                                    <option value="12">Douce dernier mois</option>
                                    <option value="24">Veint-quatre dernier mois</option>
                                </select>
                            </div>
                            <!-- <div class="column">
                                <label for="date-start">Date début</label>
                                <input type="date" name="date-start">
                            </div>
                            <div class="column">
                                <label for="montant">Date fin</label>
                                <input type="date" name="date-end">
                            </div> -->
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
<?php get_footer('admin'); ?>