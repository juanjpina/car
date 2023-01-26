<?php get_header('Alerts edit', 'admin'); ?>
<section>
    <div class="alerts">
        <a class="closed" href="<?= $router->generate('white') ?>"><img src="/src/assets/images/closed.png" width="25" height="25" title="Fermer" alt="Fermer"></a>
        <div class="column">
            <h1 class="title">Rappel</h1>
            <h6>Voici les dates d'entretien du véhicule <?= ($_SESSION['car']['trademark']) ?> pour les prochaines modifications</h6>
        </div>
        <div class="column">
            <?php if (isset($getControl)) { ?>
                <div class="tbl">
                    <table>
                        <tr>
                            <th colspan="2">Courroie de distribution</th>
                            <th colspan="1">Contrôle Technique</th>
                            <th colspan="1">Vidange</th>
                        </tr>
                        <tr>
                            <th>KM</th>
                            <th>Date</th>
                            <th>Date</th>
                            <th>KM</th>
                        </tr>
                        <?php foreach ($getTimingKm as $km) { ?>
                            <?php foreach ($getTimingDate as $date) { ?>
                                <?php foreach ($getControl as $control) { ?>
                                    <?php foreach ($getOil as $oil) { ?>
                                        <tr>
                                            <td><?= $km['km']; ?></td>
                                            <td><?= date("d-m-Y", strtotime($date['dates'])) ?></td>
                                            <td><?= date("d-m-Y", strtotime($control['datetechnical'])) ?></td>
                                            <td><?= $oil['oil']; ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php get_footer('admin'); ?>