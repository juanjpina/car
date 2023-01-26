<?php get_header('menu totales', 'admin') ?>
<section>
    <div class="statistics column">
    <a class="closed" href="<?= $router->generate('white') ?>"><img src="/src/assets/images/closed.png" width="25" height="25" title="Fermer" alt="Fermer"></a>
    
        <h1 class='title'>Statistique</h1>
        <h6>Sélectionnez une année pour acceder à la totalité des frais du véhicule <?php echo $_SESSION['car']['trademark']; ?></h6>
        <form action="" method="post">
            <div>
                <div class="column">
                    <label for="year">L'année</label>
                    <input type="number" name="year" class="input">
                </div>
            </div>
            <div>
                <div class="column">
                    <input type='hidden' name="ok" value="ok">
                    <button class='button' type="submit">Sauvegarder</button>
                </div>
            </div>
        </form>
    </div>
</section>
<?php get_footer('admin') ?>