<?php get_header('InvoiceCar', 'compte') ?>
<div class="invoiceCar">
    <div class="column">
        <h1 class='title'>Les premières données du véhicule</h1>
    </div>
    <div class="column">
        <ul>
            <form action="" method="post">
                <div class="column">
                    <li>
                        <div class="column info">
                            <?php foreach ($buy as $b) { ?>
                                <p class='textTitleInput'>Information au moment de l'achat</p>
                                <div class='row'>
                                    <div class="column date">
                                        <label for="date1 ">Date</label>
                                        <input type="date" class='input' name='date1' value="<?= $b['date'];  ?>">
                                    </div>
                                    <div class="column">
                                        <label for="km1">Km</label>
                                        <input type="number" class='input' name='km1' placeholder='<?= $b['km']; ?>' value="">
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class='column'>
                            <?php foreach ($first as $f) { ?>
                                <p class='textTitleInput'>La première immatriculation</p>
                                <div class='row'>
                                    <div class="column date">
                                        <label for="date5">Date</label>
                                        <input type="date" class='input' name='date5' value="<?= $f['date']; ?>">
                                    </div>
                                    <div class="column">
                                        <label for="km5">Km</label>
                                        <input type="number" class='input' name='km5' placeholder="<?= $f['km']; ?>" value="">
                                    </div>
                                </div>
                            <?php }; ?>
                        </div>
                    </li>
                </div>
                <li class="submit">
                    <div class="column">
                        <button type="submit" class="button">Confirmez les données</button>
                    </div>
                </li>
            </form>
        </ul>
    </div>
</div>