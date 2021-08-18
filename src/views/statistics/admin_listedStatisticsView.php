<?php get_header('statistics add', 'admin'); ?>

<div class="statistics">
    <div class="contained column">

        <div class="column">
            <h1 class='title'>Liste Statistique</h1>
            <h2>Resultat de <?= $_GET['period'] ?> mois</h2>
            <div class=''>

                <table>
                    <tr>
                        <th>Peaje</th>
                        <th>Combustible</th>
                        <th>Assurance</th>
                        <th>Vidange</th>
                        <th>Pneu</th>
                        <th>Contrôle technique</th>
                        <th>Courroie de distribution</th>
                        <th>Mountant total</th>
                    </tr>

                    <tr>
                        <td><?= $invtoll[0]['SUM(total)'] ?></td>
                        <td><?= $invfuel[0]['SUM(total)'] ?></td>
                        <td><?= $invinsurance[0]['SUM(total)'] ?></td>
                        <td><?= $invoil[0]['SUM(total)'] ?></td>
                        <td><?= $invpneu[0]['SUM(total)'] ?></td>
                        <td><?= $invtechnical[0]['SUM(total)'] ?></td>
                        <td><?= $invtiming[0]['SUM(total)'] ?></td>
                        <td><?= $total ?></td>
                    </tr>
                </table>
            </div>







            <!-- <?= 'total Peirod genereal' . $getTotalPeriod[0]['SUM(total)']; ?> -->
            <!-- <?= 'total Peirod car' . $getTotalPeriodCar[0]['SUM(total)']; ?> -->




        </div>
    </div>
</div>
<?php get_footer('admin'); ?>