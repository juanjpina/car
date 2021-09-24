<?php get_header('Alerts edit', 'admin'); ?>
<div class="alerts">
    <div class="column">
        <h1 class="title">Rappel</h1>
        <h6>Voici les dates d'entretien du véhicule pour les prochaines modifications</h6>
    </div>
    <div class="column">
        <?php if (!empty($getControl)) { ?>
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
                    <?php foreach ($getControl as $control) { ?>
                        <?php foreach ($getOil as $oil) { ?>
                            <?php foreach ($getTimingKm as $km) { ?>
                                <?php foreach ($getTimingDate as $date) { ?>
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
<?php get_footer('admin'); ?>