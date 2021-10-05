<?php get_header('menu statiscics', 'admin') ?>
<section>
    <div class='menuStatistics'>
        <div class='container row'>
            <a href="<?= $router->generate('addstatistics'); ?>">
                <div class='period'>
                    <p class=''>
                        Périodes
                    </p>
                </div>
            </a>
            <a href="<?= $router->generate('menutotalstatistics'); ?>">
                <div class='total'>
                    <p class=''>
                        Sommes
                    </p>
                </div>
            </a>
            <a href="<?= $router->generate('menugraphics'); ?>">
                <div class='graphic'>
                    <p class=''>
                        Graphiques
                    </p>
                </div>
            </a>
            <a href="<?= $router->generate('fuelstatistics'); ?>">
                <div class='graphic'>
                    <p class=''>
                        Carburant
                    </p>
                </div>
            </a>
        </div>
    </div>
</section>
<?php get_footer('admin') ?>