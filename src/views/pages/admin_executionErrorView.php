<?php get_header('execute ok', 'admin'); ?>
<section class="column">
    <div class="execute column ">

        <div class="banner column">
            <h6>Essayez encore, s’il vous plaît </h6>
            <a href="<?= $router->generate('whiteHome'); ?>">
                <div class="button">
                    <p>Continuez</p>
                </div>
            </a>
        </div>


    </div>
</section>
<?php get_footer('admin'); ?>