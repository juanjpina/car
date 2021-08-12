<?php get_header('history add', 'admin'); ?>
<div class="history column">
    <div class="contained column ">
        <h1 class='title'>Historique du factures</h1>
        <ul>
            <form action="" method="post">
                <li>
                    <div class="column ">
                        <h3>Facture</h3>
                        <select name="invoice" class='select invoice'>
                            <?php foreach ($invoice as $invo) { ?>
                                <option value="<?= $invo['invoice'] ?>"><?= $invo['type'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </li>
                <li class='data'>
                    <div class="row">
                        <div class="column space">
                            <h3>Périodes</h3>
                            <select name="period" class='select se'>
                                <option value="0">Périodes</option>
                                <option value="3">Trois dernier mois</option>
                                <option value="6">six dernier mois</option>
                                <option value="12">C'est dernier année</option>
                            </select>
                        </div>
                        <div class="column space">
                            <label for="dateStart">Date début</label>
                            <input type="date" class='input se ' name="dateStart">
                        </div> <!-- funcin con mensaje echo -->
                        <div class="column space">
                            <label for="dateEnd">Date fin</label>
                            <input type="date" class='input se' name="dateEnd">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="column">
                        <?php $data = xx($router); ?>
                        <?php dump($data);  ?>
                        <input type='hidden' name="ok" value="ok">
                        <button class='button' type="submit">Sauvegarder</button>
                    </div>
                </li>
            </form>
        </ul>
    </div>
</div>
<?php get_footer('admin'); ?>