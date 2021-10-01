<?php get_header('history add', 'admin'); ?>
<div class="history">
    <div class="column ">
        <h1 class='title'>Historique des frais</h1>
        <h6>Selon le type de frais sélectionnez une période ou date pour accéder aux données</h6>
    </div>

    <form action="" method="post">
        <div class="column">

            <div class="column">
                <h6>Frais</h6>
                <select name="invoice" class='select'>
                    <?php foreach ($invoice as $invo) { ?>
                        <option value="<?= $invo['invoice'] ?>"><?= $invo['type'] ?></option>
                    <?php } ?>
                </select>
            </div>


            <div class="row">
                <div class="column space">
                    <h6>Périodes</h6>
                    <select name="period" class='select'>
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
                </div>

            </div>

            <div class="column">
                <input type='hidden' name="ok" value="ok">
                <button class='button' type="submit">Sauvegarder</button>
            </div>


    </form>

</div>

<?php get_footer('admin'); ?>