<?php get_header('listed graphics', 'admin'); ?>

<div class='listedGraphics'>
    <div class='container'>
        <?php $invtoll = $endYear[1] * 100 / $totalEndYear ?>
        <?php $invfuel = $endYear[2] * 100 / $totalEndYear; ?>
        <?php $invoil = $endYear[3] * 100 / $totalEndYear; ?>
        <?php $invtiming = $endYear[4] * 100 / $totalEndYear; ?>
        <?php $invinsurance = $endYear[5] * 100 / $totalEndYear; ?>
        <?php $invpneu = $endYear[6] * 100 / $totalEndYear; ?>
        <?php $invtechnical = $endYear[7] * 100 / $totalEndYear; ?>
        <div class='graphic' style='background-image:conic-gradient( #fc2323 <?= $invtoll ?>%, #6bf7ff <?= $invtoll ?>% <?= $invfuel ?>%,  #fc4517 <?= $invfuel ?>% <?= $invoil ?>%, #46ff7b <?= $invoil ?>% <?= $invtiming ?>%, #4f0afc <?= $invtiming ?>% <?= $invinsurance ?>%, #fced30 <?= $invinsurance ?>% <?= $invpneu ?>% , #fc6b0a <?= $invpneu ?>% <?= $invtechnical ?>%); border-radius:50%;'>
        </div>

        <div class='as'>

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
</div>
<?php get_footer('admin') ?>