<?php get_header('invoice add', 'admin'); ?>
<div class="editInvoice column">
    <div class="column">
        <h1 class='title'>Modifier ou annuler les factures</h1>
    </div>
    <div class="column">
        <form action="" method="post">
            <ul>
                <li>
                    <div class="column">
                        <h3>Votre véhicule</h3>
                        <select name="trademark" class="input">
                            <?php foreach ($trademark as $trade) { ?>
                                <option value="<?= $trade['id_car']; ?>"><?= $trade['trademark']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </li>
                <li>
                    <div class="column">
                        <h3>Facture</h3>
                        <select name="typeInvoice" class="input">
                            <?php foreach ($typeInvoice as $invo) { ?>
                                <option value="<?= $invo['id_type'] ?>"><?= $invo['type'] ?> </option>
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
                            <td class='icon'><a href="#"><img src="/proyectocar/car/src/assets/images/edit.png" width="15" height="15" alt=""> </a></td>
                            <td class='icon'><a href="<?= $router->generate('deleteInvoice', ['id' => $invoice['id']]); ?>"><img src="/proyectocar/car/src/assets/images/delete.png" width="15" height="15" alt=""> </a></td>
                            <!-- ['id' => $_GET['id']] -->
                        </tr>

                    <?php }; ?>
                </table>

            </li>





            <!-- <li>
                    <div class="row">
                        <div class="date column">
                            <label for="date">Date</label>
                            <input type="date" class='input' name="date" value="<?= $invoice['date']; ?>">
                        </div>
                        <div class="km column">
                            <label for="km">Km</label>
                            <input type="number" class="input" name="km" value="<?= $invoice['km']; ?>">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="column">
                        <label for="total">Montant facture</label>
                        <input type="number" class="input" name="total" value="<?= $invoice['total']; ?>">
                    </div>
                </li>
                <li>
                <li>
                    <div class="column">
                        <label for="comment">Comment</label>
                        <input type="text" class="input" name="comment" value="<?= $invoice['comment']; ?>">
                    </div>
                </li> -->
            <!-- <div class="column buttonSubmit">
                <button type="submit" class="button">Sauvegarder</button>
            </div>
            </li> -->
            </ul>
        </form>
    </div>
</div>
<?php get_footer('admin'); ?>