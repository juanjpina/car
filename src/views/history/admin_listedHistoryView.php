<?php get_header('history listed', 'admin'); ?>
<section>
    <div class="listedHistory">
        <a class="closed" href="<?= $router->generate('white') ?>"><img src="/src/assets/images/closed.png" width="25" height="25" title="Fermer" alt="Fermer"></a>
        <div class="contained">
            <div class="column">
                <h1 class="title">Liste des frais de <?= $typeInvoice[0]['type'] ?></h1>
                <div class='table'>

                    <?php if (!empty($invoice)) { ?>

                        <table>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Km</th>
                                    <th>Total</th>
                                    <th>Commentaires</th>
                                </tr>
                            </thead>
                            <?php foreach ($invoice as $invo) { ?>
                                <tr>
                                    <td><?= date("d-m-Y", strtotime($invo['date'])) ?></td>
                                    <td><?= $invo['km']; ?></td>
                                    <td><?= $invo['total']; ?></td>
                                    <td><?= $invo['comment']; ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <th colspan="2">Montant total</th>
                                <td><?= $totalPeriod[0]['SUM(total)']; ?></td>
                            </tr>
                        </table>
                    <?php } else {
                        echo "<p>il n'y a pa de donnes pour le véhicule " . $_SESSION['car']['trademark'] . "</p>";
                    } ?>
                </div>
            </div>
        </div>
</section>
<?php get_footer('admin'); ?>