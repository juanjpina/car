<?php get_header('statistics add', 'admin'); ?>

<div class="statistics column">
    <!-- <div class="contained column"> -->
    <h1 class='title'>Statistique</h1>
    <h6>Sélectionnez une période pour accéder aux données des frais</h6>
    <form action="" method="post">
        <ul>
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
            <li>
                <div class="column">
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
    <!-- </div> -->
</div>
<?php get_footer('admin'); ?>