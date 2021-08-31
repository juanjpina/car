<?php get_header('history listed', 'admin'); ?>
<div class="listedHistory">
    <div class="contained">
        <form action="">
            <div class="column">
                <h1 class="title">Liste Facture <?= $typeInvoice[0]['type'] ?></h1>
                <div class='table'>
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Km</th>
                                <th>Total</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <?php foreach ($invoice as $invo) { ?>
                            <tr>
                                <td><?= date("d-m-Y", strtotime($invo['date'])) ?></td>
                                <td><?= $invo['km']; ?></td>
                                <td><?= $invo['total']; ?></td>
                                <td><?= $invo['comment']; ?></td>
                            </tr>
                        <?php } ?>
                        <tr>

                            <th colspan="2">Montant total</th>
                            <td><?= $totalPeriod[0]['SUM(total)']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>
<?php get_footer('admin'); ?>