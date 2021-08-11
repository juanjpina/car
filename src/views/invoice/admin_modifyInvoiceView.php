<?php get_header('modify Invoice', 'admin') ?>
<div class='modifiInvoici'>
    <div class='subModifi column'>
        <h1 class='title'>Modifier les factures</h1>
        <form action="" method="post">
            <?php foreach ($getInvoice as $get) { ?>
                <ul>
                    <li class='column'>
                        <label for="date">Date</label>
                        <input class='input' class='input' type="date" name='date' value="<?= $get['date'] ?>">
                    </li>
                    <li class='column'>
                        <label for="km">Km</label>
                        <input class='input' type="number" name='number' value="<?= $get['km'] ?>">
                    </li>
                    <li class='column'>
                        <label for="total">Date</label>
                        <input class='input' type="number" name='total' value="<?= $get['total'] ?>">
                    </li>
                    <li class='column'>
                        <label for="comment">Comment</label>
                        <input class='input' type="text" name='comment' value="<?= $get['comment'] ?>">
                    </li>
                    <li class='column'>
                        <button class='button' type="submit">Sauvegarder</button>
                    </li>
                </ul>
            <?php   } ?>
        </form>
    </div>
</div>
<?php get_footer('admin') ?>