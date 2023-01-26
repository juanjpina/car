<?php get_header('deleteInvoice', 'admin') ?>
<section>
    <div class='conta column'>
        <a class="closed" href="<?= $router->generate('white') ?>"><img src="/car/src/assets/images/closed.png" width="25" height="25" title="Fermer" alt="Fermer"></a>
        <div class="deleteInvoice">
            <form action="" method="post">
                <div class='column'>
                    <div>
                        <label form='delete'>Êtes vous certain de vouloir supprimer définitivement ces frais?</label>
                        <input type="hidden" name="delete" value="ok">
                    </div>
                    <div class="row response-button">
                        <a class='button' href="<?= $router->generate('whiteHome'); ?>">NON</a>
                        <a href="#"><button class='button yes' type="submit">OUI</button></a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</section>
<?php get_footer('admin'); ?>