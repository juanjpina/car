<?php get_header('execute ok', 'admin'); ?>
<section>
    <div class="execute column ">
        <div class="banner column">
            <h6>Le processus a été exécuté correctement</h6>
            <a href="<?= $router->generate('whiteHome'); ?>">
                <div class="button">
                    <p>Continuez</p>
                </div>
            </a>
        </div>
    </div>
</section>
<?php get_footer('admin'); ?>