<?php get_header('listed graphics', 'admin'); ?>
<section>
    <div class='listedGraphics'>
        <a class="closed" href="<?= $router->generate('white') ?>"><img src="/src/assets/images/closed.png" width="25" height="25" title="Fermer" alt="Fermer"></a>
        <div class='column'>
            <h1 class="title">Résultat de la comparaison</h1>
        </div>
        <div class="row">
            <?php if (
                !empty($invtollStart) || !empty($invfuelStart) || !empty($invoilStart)
                || !empty($invtimingStart) || !empty($invinsuranceStart) || !empty($invtechnicalStart) || !empty($invpneuStart)
                || !empty($invtollEnd) || !empty($invfuelEnd) || !empty($invoilEnd) || !empty($invtimingEnd) || !empty($invinsuranceEnd)
                || !empty($invpneuEnd) ||  !empty($invtechnicalEnd)
            ) { ?>
                <div class='start'>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load("current", {
                            packages: ["corechart"]
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Task', 'Hours per Day'],
                                ['Péage', <?= $invtollStart ?>],
                                ['Carburant', <?= $invfuelStart ?>],
                                ['Vidange', <?= $invoilStart ?>],
                                ['Courroie de distribution', <?= $invtimingStart ?>],
                                ['Assurance', <?= $invinsuranceStart ?>],
                                ['Pneu', <?= $invpneuStart ?>],
                                ['Contrôle technique', <?= $invtechnicalStart ?>],
                            ]);
                            var options = {
                                title: 'Année <?= $startY ?>',
                                pieHole: 0.4,
                            };
                            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                            chart.draw(data, options);
                        }
                    </script>
                    <div id="donutchart" style="width: 500px; height: 300px;"></div>
                </div>
                <div class='end'>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load("current", {
                            packages: ["corechart"]
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Task', 'Hours per Day'],
                                ['Péage', <?= $invtollEnd ?>],
                                ['Carburant', <?= $invfuelEnd ?>],
                                ['Vidange', <?= $invoilEnd ?>],
                                ['Courroie de distribution', <?= $invtimingEnd ?>],
                                ['Assurance', <?= $invinsuranceEnd ?>],
                                ['Pneu', <?= $invpneuEnd ?>],
                                ['Contrôle technique', <?= $invtechnicalEnd ?>],
                            ]);
                            var options = {
                                title: 'Année <?= $endY ?>',
                                pieHole: 0.4,
                            };
                            var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
                            chart.draw(data, options);
                        }
                    </script>
                    <div id="donutchart2" style="width: 500px; height: 300px;"></div>
                </div>
                <div class="alert">
                <?php } else {
                echo "<p style= color:black >Il n'y pas de données pour le véhicule " . $_SESSION['car']['trademark'] . "</p>";
            } ?>
                </div>
        </div>
    </div>
</section>
<?php get_footer('admin') ?>