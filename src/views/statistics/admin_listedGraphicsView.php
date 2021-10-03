<?php get_header('listed graphics', 'admin'); ?>
<section>
    <div class='listedGraphics'>
        <div class='column'>
            <h1 class="title">Résultat de la comparaison</h1>
        </div>
        <div class="row">

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
                            ['Peaje', <?= $invtollStart ?>],
                            ['Carburant', <?= $invfuelStart ?>],
                            ['Vidance', <?= $invoilStart ?>],
                            ['Courroie de distribution', <?= $invtimingStart ?>],
                            ['Assurance', <?= $invinsuranceStart ?>],
                            ['Pneu', <?= $invpneuStart ?>],
                            ['Contrôle techinical', <?= $invtechnicalStart ?>],
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
                            ['Peaje', <?= $invtollEnd ?>],
                            ['Carburant', <?= $invfuelEnd ?>],
                            ['Vidance', <?= $invoilEnd ?>],
                            ['Courroie de distribution', <?= $invtimingEnd ?>],
                            ['Assurance', <?= $invinsuranceEnd ?>],
                            ['Pneu', <?= $invpneuEnd ?>],
                            ['Contrôle techinical', <?= $invtechnicalEnd ?>],
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
        </div>
    </div>
</section>
<?php get_footer('admin') ?>