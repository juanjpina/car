<?php get_header('invoice add', 'admin'); ?>
<div class="editInvoice column">
    <div class="column">
        <h1 class='title'>Modifier ou annuler les factures</h1>
    </div>
    <div class="column">
        <form action="" method="post">
            <ul>
                <li>
                    <div class="column">
                        <h3>Votre véhicule</h3>
                        <select name="trademark" class="input">
                            <?php foreach ($trademark as $trade) { ?>
                                <option value="<?= $trade['id_car']; ?>"><?= $trade['trademark']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </li>
                <li>
                    <div class="column">
                        <h3>Facture</h3>
                        <select name="typeInvoice" class="input">
                            <?php foreach ($typeInvoice as $invo) { ?>
                                <option value="<?= $invo['id_type'] ?>"><?= $invo['type'] ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </li>
                <li>
                    <div class="column buttonSubmit">
                        <button type="submit" class="button">Sauvegarder</button>
                    </div>
                </li>
        </form>
        <form action="" method="post">
            <li>
                <div class="column">
                    <h3>Liste du Factures</h3>
                    <select name="invoice" class="input">
                        <?php foreach ($selectInvoice as $inv) { ?>
                            <option value="<?= $inv['id_toll'] ?>"><?= 'date: ' . $inv['date']  . '  km: ' . $inv['km'] ?> </option>
                        <?php } ?>
                    </select>
                </div>
            </li>
            <?php foreach ($getInvoice as $invoice) { ?>
                <li>
                    <div class="row">
                        <div class="date column">
                            <label for="date">Date</label>
                            <input type="date" class='input' name="date" value="<?= $invoice['date']; ?>">
                        </div>
                        <div class="km column">
                            <label for="km">Km</label>
                            <input type="number" class="input" name="km" value="<?= $invoice['km']; ?>">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="column">
                        <label for="total">Montant facture</label>
                        <input type="number" class="input" name="total" value="<?= $invoice['total']; ?>">
                    </div>
                </li>
                <li>
                <li>
                    <div class="column">
                        <label for="comment">Comment</label>
                        <input type="text" class="input" name="comment" value="<?= $invoice['comment']; ?>">
                    </div>
                </li>
            <?php }; ?>
            <div class="column buttonSubmit">
                <button type="submit" class="button">Sauvegarder</button>
            </div>
            </li>
            </ul>
        </form>
    </div>
</div>
<?php get_footer('admin'); ?>