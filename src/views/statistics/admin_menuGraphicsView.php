<?php get_header('menu totales', 'admin') ?>
<section>
    <div class="menu-statisticsGraph">
        <a class="closed" href="<?= $router->generate('white') ?>"><img src="/src/assets/images/closed.png" width="25" height="25" title="Fermer" alt="Fermer"></a>
        <div class="column">
            <h1 class='title'>Statistique</h1>
            <h6>Sélectionnez deux années différentes pour accéder aux graphiques comparatifs du véhicule <?php echo $_SESSION['car']['trademark']; ?></h6>
        </div>
        <form action="" method="post">
            <div class="column">
                <div class="column">
                    <label for="startYear">De l'année</label>
                    <input type="number" name="startYear" class="input">
                </div>
                <div class="column">
                    <label for="endYear">À l'année</label>
                    <input type="number" name="endYear" class="input">
                </div>
                <div class="column">
                    <input type='hidden' name="ok" value="ok">
                    <button class='button' type="submit">Sauvegarder</button>
                </div>
            </div>
        </form>
    </div>
</section>
<?php get_footer('admin') ?>