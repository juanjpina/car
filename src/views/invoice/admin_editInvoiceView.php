<?php get_header('invoice add', 'admin'); ?>
<div class="editInvoice column">
    <div class='subEdit'>

        <div class="column">
            <h1 class='title'>Modifier ou annuler les factures</h1>
        </div>
        <div class="column">
            <form action="" method="post" class='column'>
                <ul>
                    <li>
                        <div class="column trademark">


                            <h3>Votre véhicule</h3>
                            <select name="trademark" class="select">
                                <?php foreach ($trademark as $trade) { ?>
                                    <option value="<?= $trade['id_car']; ?>"><?= $trade['trademark']; ?> </option>
                                <?php } ?>
                            </select>

                        </div>
                    </li>
                    <li>
                        <div class="column trademark">
                            <h3>Facture</h3>
                            <select name="typeInvoice" class="select">
                                <?php foreach ($typeInvoice as $invo) { ?>
                                    <option value="<?= $invo['invoice']; ?>"><?= $invo['type']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="column buttonSubmit">
                            <button type="submit" class="button">Sauvegarder</button>
                        </div>
                    </li>
            </form>
            <div class='table'>
                <form action="" method="get">
                    <li>
                        <div class="column">
                            <h3>Liste des Factures</h3>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Km</th>
                                    <th>Total</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <?php foreach ($selectInvoice as $invoice) { ?>
                                <tr>
                                    <td><?= $invoice['date']; ?></td>
                                    <td><?= $invoice['km']; ?></td>
                                    <td><?= $invoice['total']; ?></td>
                                    <td><?= $invoice['comment']; ?></td>
                                    <?php if ($invoice['id'] != '') { ?>
                                        <td class='icon'><a href="<?= $router->generate(
                                                                        'modifyInvoice',
                                                                        [
                                                                            'id' => $invoice['id'],
                                                                            'db' => $_POST['typeInvoice']
                                                                        ]
                                                                    ); ?>"><img src="/proyectocar/car/src/assets/images/edit.png" width="15" height="15" alt=""> </a></td>
                                        <td class='icon'><a href="<?= $router->generate(
                                                                        'deleteInvoice',
                                                                        [
                                                                            'id' => $invoice['id'],
                                                                            'db' => $_POST['typeInvoice']
                                                                        ]
                                                                    ); ?>"><img src="/proyectocar/car/src/assets/images/delete.png" width="15" height="15" alt=""> </a></td>
                                </tr>
                            <?php } else { ?>
                                <td class='icon'><a href="#"></a></td>
                                <td class='icon'><a href="#"></a></td>
                                </tr>
                            <?php   } ?>
                        <?php }; ?>
                        </table>
                    </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</div>
<?php get_footer('admin'); ?>