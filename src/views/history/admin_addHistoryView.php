<?php get_header('history add', 'admin'); ?>


<div class="history">
    <div class="contained">
        <form action="">
            <div class="select column">
                <h3>Facture</h3>
                <select name="select">
                    <option value="value1">Value 1</option>
                    <option value="value2" selected>Value 2</option>
                    <option value="value3">Value 3</option>
                </select>

            </div>
            <div class="data row">
                <div class="periode column">
                    <select name="select">
                        <option value="value1">Value 1</option>
                        <option value="value2" selected>Value 2</option>
                        <option value="value3">Value 3</option>
                    </select>
                </div>
                <div class="date column">
                    <label for="date-start">Date début</label>
                    <input type="date" name="date-start">
                </div>
                <div class="date column">
                    <label for="montant">Date fin</label>
                    <input type="date" name="date-end">
                </div>
            </div>
            <div class="confirmation">
                <div class="column">
                    <h5>Ajoutez une facture</h5>
                    <a href="<?= $router->generate('listedhistory'); ?>">
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