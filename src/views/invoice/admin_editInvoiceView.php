<?php get_header('invoice add', 'admin'); ?>
<section>
    <div class="editInvoice">
        <a class="closed" href="<?= $router->generate('white') ?>"><img src="/src/assets/images/closed.png" width="25" height="25" title="Fermer" alt="Fermer"></a>
        <div class="column">
            <h1 class='title'>Modifier ou annuler les frais</h1>
            <h6>Vous pouvez modifier ou annuler les données sauvegardées précédemment</h6>
        </div>
        <div class="column">

            <form action="" method="post">
                <div class="column">
                    <h6>Frais</h6>
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

            <?php if (isset($selectInvoice) && !empty($selectInvoice)) {
                if (is_array($selectInvoice)) { ?>
                    <div class="column">
                        <h6>Liste des frais</h6>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Km</th>
                                <th>Total</th>
                                <th>Commentaires</th>
                            </tr>
                        </thead>
                        <?php foreach ($selectInvoice as $invoice) { ?>
                            <tr>
                                <td class='date'><?= date("d-m-Y", strtotime($invoice['date'])); ?></td>
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
                                                                ); ?>"><img src="/src/assets/images/edit.png" width="15" height="15" alt=""> </a></td>
                                    <td class='icon'><a href="<?= $router->generate(
                                                                    'deleteInvoice',
                                                                    [
                                                                        'id' => $invoice['id'],
                                                                        'db' => $_POST['typeInvoice']
                                                                    ]
                                                                ); ?>"><img src="/src/assets/images/delete.png" width="15" height="15" alt=""> </a></td>
                                <?php } else { ?>
                                <?php  }; ?>
                            </tr>
                        <?php }; ?>
                    </table>
            <?php } else {
                    echo "<p>Il n'y a pas de donnés pour le véhicule " .  $_SESSION['car']['trademark'] . "</p>";
                }
            } ?>

        </div>
    </div>
</section>
<?php get_footer('admin'); ?>