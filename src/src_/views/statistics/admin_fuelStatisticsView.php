<?php get_header('fuelstatistics', 'admin'); ?>
<section>
    <div class='fuelStatistics'>
    <a class="closed" href="<?= $router->generate('white') ?>"><img src="/car/src/assets/images/closed.png" width="25" height="25" title="Fermer" alt="Fermer"></a>
    
        <div class="column">
            <h1 class="title">Carburant</h1>
            <h6>Tableau de frais de carburant du Véhicule <?php echo $_SESSION['car']['trademark']; ?></h6>
        </div>
        <div class="table column">
            <table>
                <tr>
                    <th>Kilométrage de départ</th>
                    <th>Kilométrage total de voiture</th>
                    <th>kilométrage depuis départ</th>
                    <th>Total euros</th>
                    <th>Coût par kilomètre</th>
                </tr>
                <tr>
                    <td><?= $kmStart ?></td>
                    <td><?= $kmTotal ?></td>
                    <td><?= $resultKm ?></td>
                    <td><?= $totalCost ?></td>
                    <td><?= $resultCost ?></td>
                </tr>
            </table>
        </div>
    </div>
</section>
<?php get_footer('admin'); ?>