<?php get_header('statistics add', 'admin'); ?>
<section>
    <div class="statistics column">
        <a class="closed" href="<?= $router->generate('white') ?>"><img src="/car/src/assets/images/closed.png" width="25" height="25" title="Fermer" alt="Fermer"></a>
       
        <h1 class='title'>Statistique</h1>
        <h6>Sélectionnez une période pour accéder aux données du véhicule <?php echo $_SESSION['car']['trademark']; ?></h6>
        <form action="" method="post">
            <div class="column">
                <div class="column period">
                    <h3>Périodes</h3>
                    <select name="period" class='select'>
                        <option value="0">Périodes</option>
                        <option value="1">Dernier mois</option>
                        <option value="3">Trois dernier mois</option>
                        <option value="6">Six dernier mois</option>
                        <option value="9">Neuf dernier mois</option>
                        <option value="12">Douze dernier mois</option>
                        <option value="24">Vingt-quatre dernier mois</option>
                    </select>
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
<?php get_footer('admin'); ?>