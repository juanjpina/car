<?php get_header('total statistics', 'admin') ?>
<section>
    <div class='totalStatistics'>
    <a class="closed" href="<?= $router->generate('white') ?>"><img src="/car/src/assets/images/closed.png" width="25" height="25" title="Fermer" alt="Fermer"></a>
    
        <div class='container'>
            <div class="column">
                <h1 class='title'>Resulta par moi de l'année <?= $_GET['year'] ?></h1>
                <h6>Tableau de frais du véhicule <?php echo $_SESSION['car']['trademark']; ?></h6>
            </div>
            <div class="column">
                <table>
                    <tr>
                        <th>Janvier</th>
                        <th>Février</th>
                        <th>Mars</th>
                        <th>Avril</th>
                        <th>Mai</th>
                        <th>Juin</th>
                        <th>Juillet</th>
                        <th>Août</th>
                        <th>Septembre</th>
                        <th>Octobre</th>
                        <th>Novembre</th>
                        <th>Décembre</th>
                    </tr>
                    <tr>
                        <?php foreach ($totales as $total) { ?>
                            <td><?= $total ?></td>
                        <?php } ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>
<?php get_footer('admin') ?>