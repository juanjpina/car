<?php get_header('fuelstatistics', 'admin'); ?>
<div class='fuelStatistics'>
    <div class="column">
        <h1 class="title">Carburant</h1>
    </div>
    <div class="table column">
        <table>
            <tr>
                <th>Debut du Kilometrage</th>
                <th>Total du kilometrage</th>
                <th>Total du kilometrage effectué</th>
                <th>Total euros</th>
                <th>Coste par kilometre</th>
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