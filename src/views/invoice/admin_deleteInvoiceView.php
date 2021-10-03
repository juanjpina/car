<?php get_header('deleteInvoice', 'admin') ?>
<section>
    <div class='conta column'>
        <div class="deleteInvoice">
            <form action="" method="post">
                <div class='column'>
                    <div>
                        <label form='delete'>Êtes vous certain de vouloir supprimer définitivement ce frais?</label>
                        <input type="hidden" name="delete" value="ok">
                    </div>
                    <div>
                        <button class='button' type="submit">Je suis d' accord</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php get_footer('admin'); ?>