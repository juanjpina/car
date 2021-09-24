<?php get_header('invoice add', 'admin'); ?>
<div class="addInvoice">
    <div class="column">
        <h1 class='title'>Ajouter les frais</h1>
        <h6>Vous pouvez ajouter les coûts selon les différentes consommations</h6>
    </div>
    <div class="column">
        <form action="" method="post">
            <ul>
                <li>
                    <div class="column">
                        <h3>Frais</h3>
                        <select name="invoice" class="select">
                            <?php foreach ($invoice as $invo) { ?>
                                <option value="<?= $invo['id_type'] ?>"><?= $invo['type'] ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="column date">
                            <label for="date">Date</label>
                            <input type="date" class='input' name="date">
                        </div>
                        <div class="column">
                            <label for="km">Km</label>
                            <input type="number" class="input" name="km">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="column">
                        <label for="total">Montant frais</label>
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