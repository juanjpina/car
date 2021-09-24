<?php get_header('total statistics', 'admin') ?>
<div class='totalStatistics'>
    <div class='container'>
        <div class="column">

            <h1 class='title'>Resulta par moi de l'année<?= $_GET['year'] ?></h1>
        </div>
        <div class="column">
            <table>
                <tr>
                    <th>Janvier</th>
                    <th>Février</th>
                    <th>Mars</th>
                    <th>Avril</th>
                    <th>Mai</th>
                    <th>Juin</th>
                    <th>Juillet</th>
                    <th>Août</th>
                    <th>Septembre</th>
                    <th>Octobre</th>
                    <th>Novembre</th>
                    <th>Décembre</th>
                </tr>
                <tr>
                    <?php foreach ($totales as $total) { ?>
                        <td><?= $total ?></td>
                        <?php } ?>
                </tr>
            </table>
        </div>    
    </div>
</div>
<?php get_footer('admin') ?>