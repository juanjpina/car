<?php get_header('invoice add', 'admin'); ?>
<div class="addInvoice column">
    <div class="column">
        <h1 class='title'>Ajouter une facture</h1>
    </div>
    <div class="column">
        <form action="" method="post">
            <ul>
                <li>
                    <div class="select column">
                        <h3>Votre véhicule</h3>
                        <select name="trademark" class="input">
                            <?php foreach ($trademark as $trade) { ?>
                                <option value="<?= $trade['id_car']; ?>"><?= $trade['trademark']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </li>
                <li>
                    <div class="select column">
                        <h3>Facture</h3>
                        <select name="invoice" class="input">
                            <?php foreach ($invoice as $invo) { ?>
                                <option value="<?= $invo['id_type'] ?>"><?= $invo['type'] ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="date column">
                            <label for="date">Date</label>
                            <input type="date" class='input' name="date">
                        </div>
                        <div class="km column">
                            <label for="km">Km</label>
                            <input type="number" class="input" name="km">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="amount column">
                        <label for="total">Montant facture</label>
                        <input type="number" class="input" name="total">
                    </div>
                </li>
                <li>
                <li>
                    <div class="column">
                        <label for="comment">Comment</label>
                        <input type="text" class="input" name="comment">
                    </div>
                </li>
                <div class="column buttonSubmit">
                    <button type="submit" class="button">Sauvegarder</button>
                </div>
                </li>
            </ul>
        </form>
    </div>
</div>
<?php get_footer('admin'); ?>