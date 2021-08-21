<?php get_header('listed graphics', 'admin'); ?>

<div class='listedGraphics'>
    <div class='container column'>
        <!-- <?php $invtol = ((100 * $endYear[1]) / $totalEndYear);


                ?>
        <?php $invfuel = (100 * $endYear[2]) / $totalEndYear; ?>
        <?php $invoil = (100 * $endYear[3]) / $totalEndYear; ?>
        <?php $invtiming = (100 * $endYear[4]) / $totalEndYear; ?>
        <?php $invinsurance = (100 * $endYear[5]) / $totalEndYear; ?>
        <?php $invpneu = (100 * $endYear[6]) / $totalEndYear; ?>
        <?php $invtechnical = (100 * $endYear[7]) / $totalEndYear; ?>
 -->



        <div class="row">
            <div class="graphic">
                <div class="invtoll" style="width:50px; height:<?= $invtoll ?>px"></div>
                <div class="invfuel" style="width:50px; height:<?= $invfuel ?>px"></div>
                <div class="invoil" style="width:50px; height:<?= $invoil ?>px"></div>
                <div class="invtiming" style="width:50px; height:<?= $invtiming ?>px"></div>
                <div class="invinsurance" style="width:50px; height:<?= $invinsurance ?>px"></div>
                <div class="invpneu" style="width:50px; height:<?= $invpneu ?>px"></div>
                <div class="invtechnical" style="width:50px; height:<?= $invtechnical ?>px"></div>
            </div>
            <div class="graphic">
                <div class="invtoll" style="width:50px; height:<?= $invtoll ?>px"></div>
                <div class="invfuel" style="width:50px; height:<?= $invfuel ?>px"></div>
                <div class="invoil" style="width:50px; height:<?= $invoil ?>px"></div>
                <div class="invtiming" style="width:50px; height:<?= $invtiming ?>px"></div>
                <div class="invinsurance" style="width:50px; height:<?= $invinsurance ?>px"></div>
                <div class="invpneu" style="width:50px; height:<?= $invpneu ?>px"></div>
                <div class="invtechnical" style="width:50px; height:<?= $invtechnical ?>px"></div>
            </div>
        </div>
    </div>

    <div class='list'>
        <ul>
            <li>
                <span class="invtoll"></span>
                <p> Peaje</p> <?= $invtoll ?>
            </li>
            <li>
                <span class="invfuel"></span>
                <p> Combustible</p> <?= $invfuel ?>
            </li>
            <li>
                <span class="invoil"></span>
                <p>Vidance</p> <?= $invoil ?>
            </li>
            <li>
                <span class="invtiming"></span>
                <p> Courroie de distribution</p> <?= $invtiming ?>
            </li>
            <li>
                <span class="invinsurance"></span>
                <p> Assurance</p> <?= $invinsurance ?>
            </li>
            <li>
                <span class="invpneu"></span>
                <p> Pneu</p> <?= $invpneu ?>
            </li>
            <li>
                <span class="invtechincal"></span>
                <p> Controle techinical</p> <?= $invtechnical ?>
            </li>
        </ul>
    </div>




</div>
<?php get_footer('admin') ?>