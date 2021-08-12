<?php get_header('history listed', 'admin'); ?>
<div class="listedHistory">
    <div class="contained">
        <form action="">
            <div class="column">
                <h3>Liste Facture</h3>
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
                                <td><?= $invo['date']; ?></td>
                                <td><?= $invo['km']; ?></td>
                                <td><?= $invo['total']; ?></td>
                                <td><?= $invo['comment']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>
<?php get_footer('admin'); ?>