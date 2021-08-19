<?php get_header('menu statiscics', 'admin') ?>
<div class='menuStatistics'>

    <div class='container'>

        <a href="<?= $router->generate('addstatistics'); ?>">
            <div class='period'>
                <p class='title'>
                    Périodes
                </p>
            </div>
        </a>
        <a href="<?= $router->generate('menutotalstatistics'); ?>">
            <div class='total'>
                <p class='title'>
                    Totales
                </p>
            </div>
        </a>
        <a href="<?= $router->generate('menugraphics'); ?>">
            <div class='graphic'>
                <p class='title'>
                    Graphiques
                </p>
            </div>
        </a>

    </div>

</div>







<?php get_footer('admin') ?>