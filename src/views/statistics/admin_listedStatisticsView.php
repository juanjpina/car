<?php get_header('statistics add', 'admin'); ?>
<div class="statistics">
    <div class="contained">
        <div class="column">
            <h1 class='title'>Liste Statistique</h1>
            <h6>Resultat de <?= $_GET['period'] ?> mois</h6>
        </div>
        <div class='column'>
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
    </div>
</div>
<?php get_footer('admin'); ?>