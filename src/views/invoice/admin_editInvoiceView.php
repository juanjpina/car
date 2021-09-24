<?php get_header('invoice add', 'admin'); ?>
<div class="editInvoice">
    <div class="column">
        <h1 class='title'>Modifier ou annuler les frais</h1>
        <h6>Vous pouvez modifier ou annuler les données sauvegardées précédemment</h6>
    </div>
    <div class="column">
        <form action="" method="post">
                    <div class="column">
                        <h6>Facture</h6>
                        <select name="typeInvoice" class="select">
                            <?php foreach ($typeInvoice as $invo) { ?>
                                <option value="<?= $invo['invoice']; ?>"><?= $invo['type']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="">
                        <input type="hidden" name='submit' value='submit'>
                        <button type="submit" class="button">Sauvegarder</button>
                    </div>
        </form>

        <?php if ($selectInvoice[0]['date'] != '') { ?>
            
                        <div class="column">
                            <h6>Liste des Factures</h6>
                        </div>
                        <div class="tabReponsive">
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
                                    <td><?= date("d-m-Y", strtotime($invoice['date'])); ?></td>
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
                                <?php  }; ?>
                                   <?php }; ?>
                            </table>
                        </div>  
            </div>
        <?php }; ?>
    </div>
</div>
<?php get_footer('admin'); ?>