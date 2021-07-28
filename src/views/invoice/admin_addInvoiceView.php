<?php get_header('invoice add', 'admin'); ?>


<div class="invoice">
    <div class="contained">

        <form action="">

            <div class="select column">
                <h3>Facture</h3>
                <select name="select">
                    <?php foreach ($result as $resul) { ?>
                        <option value="value1"><?= $resul ?> </option>

                    <?php } ?>
                </select>

            </div>
            <div class="data row">
                <div class="date column">
                    <label for="date">Date</label>
                    <input type="date" name="date">
                </div>
                <div class="km column">
                    <label for="km">Km</label>
                    <input type="number" name="km">
                </div>
                <div class="amount column">
                    <label for="montant">Montant facture</label>
                    <input type="number" name="amout">

                </div>
            </div>
            <div class="confirmation">
                <div class="column">
                    <h5>Ajoutez une facture</h5>
                    <a href="#">
                        <div class="conf column">
                            <p>Confirmer</p>
                        </div>
                    </a>
                </div>

            </div>

        </form>

    </div>
</div>










<?php get_footer('admin'); ?>