<?php get_header('listed graphics', 'admin'); ?>

<div class='listedGraphics'>
    <div class='container column'>




        <div class="graph row">
            <div class="graphic">
                <div class="invtoll" style="width:50px; height:<?= $invtollStart ?>px"></div>
                <div class="invfuel" style="width:50px; height:<?= $invfuelStart ?>px"></div>
                <div class="invoil" style="width:50px; height:<?= $invoilStart ?>px"></div>
                <div class="invtiming" style="width:50px; height:<?= $invtimingStart ?>px"></div>
                <div class="invinsurance" style="width:50px; height:<?= $invinsuranceStart ?>px"></div>
                <div class="invpneu" style="width:50px; height:<?= $invpneuStart ?>px"></div>
                <div class="invtechnical" style="width:50px; height:<?= $invtechnicalStart ?>px"></div>
            </div>
            <div class="graphic">
                <div class="invtoll" style="width:50px; height:<?= $invtollEnd ?>px"></div>
                <div class="invfuel" style="width:50px; height:<?= $invfuelEnd ?>px"></div>
                <div class="invoil" style="width:50px; height:<?= $invoilEnd ?>px"></div>
                <div class="invtiming" style="width:50px; height:<?= $invtimingEnd ?>px"></div>
                <div class="invinsurance" style="width:50px; height:<?= $invinsuranceEnd ?>px"></div>
                <div class="invpneu" style="width:50px; height:<?= $invpneuEnd ?>px"></div>
                <div class="invtechnical" style="width:50px; height:<?= $invtechnicalEnd ?>px"></div>
            </div>
        </div>
    </div>
    <div class="yearEnd">
        <span>Année <?= $startY ?></span>
        <span>Année <?= $endY ?></span>
    </div>
    <div class='list'>
        <ul>
            <li>
                <span class="invtoll"></span>
                <p> Peaje</p> <?= $endYear[1] . '€' ?>
            </li>
            <li>
                <span class="invfuel"></span>
                <p> Combustible</p> <?= $endYear[2] . '€' ?>
            </li>
            <li>
                <span class="invoil"></span>
                <p>Vidance</p> <?= $endYear[3] . '€' ?>
            </li>
            <li>
                <span class="invtiming"></span>
                <p> Courroie de distribution</p> <?= $endYear[4] . '€' ?>
            </li>
            <li>
                <span class="invinsurance"></span>
                <p> Assurance</p> <?= $endYear[5] . '€' ?>
            </li>
            <li>
                <span class="invpneu"></span>
                <p> Pneu</p> <?= $endYear[6] . '€' ?>
            </li>
            <li>
                <span class="invtechnical"></span>
                <p> Controle techinical</p> <?= $endYear[7] . '€' ?>
            </li>
        </ul>
    </div>




</div>
<?php get_footer('admin') ?>