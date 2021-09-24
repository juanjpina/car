<?php get_header('history add', 'admin'); ?>
<div class="history">
    <div class="column ">
        <h1 class='title'>Historique des frais</h1>
        <h6>Selon le type de frais sélectionnez une période ou date pour accéder aux données</h6>
    </div>
    <div class="column">
        <ul>
            <form action="" method="post">
                <li>
                    <div class="column invoice">
                        <h3>Frais</h3>
                        <select name="invoice" class='select'>
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
                            <label for="dateEnd">De la date</label>
                            <input type="date" class='input se' name="dateEnd">
                        </div>
                        <div class="column space">
                            <label for="dateStart">À la Date</label>
                            <input type="date" class='input se ' name="dateStart">
                        </div> <!-- funcin con mensaje echo -->
                    </div>
                </li>
                <li>
                    <div class="column">
                        <input type='hidden' name="ok" value="ok">
                        <button class='button' type="submit">Sauvegarder</button>
                    </div>
                </li>
            </form>
        </ul>
    </div>
</div>

<?php get_footer('admin'); ?>