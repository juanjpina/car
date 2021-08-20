<?php get_header('listed graphics', 'admin'); ?>

<div class='listedGraphics'>
    <div class='container'>
        <?php $invtoll = $endYear[1] / 360; ?>
        <?php $invfuel = $endYear[2] / 360; ?>
        <?php $invoil = $endYear[3] / 360; ?>
        <?php $invtiming = $endYear[4] / 360; ?>
        <?php $invpneu = $endYear[5] / 360; ?>
        <div class='graphic' style='background-image:conic-gradient( #fc2323 <?= $invtoll ?>deg, #6bf7ff <?= $invfuel ?>deg,  #fc4517 <?= $invoil ?>deg, #46ff7b <?= $invtiming ?>deg), #4f0afc <?= $invpneu ?>deg ;   border-radius:50%;'>
        </div>
    </div>
</div>
<?php get_footer('admin') ?>