<?php get_header('modify Invoice', 'admin') ?>
<section>
    <div class='modifiInvoici'>
        <a class="closed" href="<?= $router->generate('white') ?>"><img src="/car/src/assets/images/closed.png" width="25" height="25" title="Fermer" alt="Fermer"></a>
        <div class='subModifi column'>
            <h1 class='title'>Modifier les frais</h1>
            <form action="" method="post">
                <?php foreach ($getInvoice as $get) { ?>
                    <ul>
                        <li class='column'>
                            <label for="date">Date</label>
                            <input class='input' class='input' type="date" name='date' value="<?= $get['date'] ?>">
                        </li>
                        <li class='column'>
                            <label for="km">Km</label>
                            <input class='input' type="number" name='km' value="<?= $get['km'] ?>">
                        </li>
                        <li class='column'>
                            <label for="total">Total</label>
                            <input class='input' type="number" name='total' value="<?= $get['total'] ?>">
                        </li>
                        <li class='column'>
                            <label for="comment">Commentaires</label>
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
</section>
<?php get_footer('admin') ?>