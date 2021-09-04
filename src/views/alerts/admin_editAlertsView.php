<?php get_header('Alerts edit', 'admin'); ?>
<div class="alerts column">
    <!-- <div class="contained column"> -->

    <div class="column">
        <h1 class='title'>Rappel</h1>
        <h6>Voici les dates d'entretien du véhicule pour les prochaines modifications</h6>
    </div>
    <ul class='column'>
        <form action="" method="post">
            <!-- <li class='column'>
                <select name='car' class='select' id='car'>
                    <?php foreach ($cars as $car) { ?>
                        <option value="<?= $car['id_car'] ?>"><?= $car['trademark']; ?></option>
                    <?php } ?>
                </select>
            </li> -->
            <!-- <li>
                <button type="submit" class='button'>Lister</button>
            </li> -->
        </form>

        <?php if (!empty($alerts)) { ?>
            <li>
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
                    <?php foreach ($alerts as $alert) { ?>
                        <tr>
                            <td><?= $alert['timingkm']; ?></td>
                            <td><?= date("d-m-Y", strtotime($alert['timingdate'])) ?></td>
                            <td><?= date("d-m-Y", strtotime($alert['controldate'])) ?></td>
                            <td><?= $alert['oilchangeskm']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </li>
        <?php } ?>
    </ul>
    <!-- <img src="/proyectocar/car/src/assets/images/add.png" width="25" height="25" alt=""> -->
    <!-- </div> -->
</div>


<?php get_footer('admin'); ?>