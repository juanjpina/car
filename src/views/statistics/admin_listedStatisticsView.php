<?php get_header('statistics add', 'admin'); ?>

<div class="statistics">
    <div class="contained">

        <div class="select column">
            <h1 class='title'>Liste Statistique</h1>
            <?= 'total Peirod genereal' . $getTotalPeriod[0]['SUM(total)']; ?>
            <?= 'total Peirod car' . $getTotalPeriodCar[0]['SUM(total)']; ?>




        </div>
    </div>
</div>
<?php get_footer('admin'); ?>