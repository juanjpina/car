<?php get_header('execute ok', 'admin'); ?>
<section>
    <div class="execute column ">
        <div class="banner column">
            <h6>Le véhicule <?php echo $_SESSION['car']['trademark']; ?> a été exécuté ajouter</h6>
            <a href="<?= $router->generate('whiteHome'); ?>">
                <div class="button">
                    <p>Continuez</p>
                </div>
            </a>
        </div>
    </div>
</section>
<?php get_footer('admin'); ?>