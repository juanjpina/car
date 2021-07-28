<?php get_header('InvoiceCar', 'compte') ?>
<div class="car">
    <div class="contained">
        <div class="select column">
            <h3>Modifier les données de votre véhicule</h3>
        </div>
        <form action="">

            <div class="column">
                <ul>
                    <li>
                        <div class="periode column">
                            <select name="select">
                                <?php foreach ($types as $type) { ?>
                                    <option><?= $type['text']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </li>


                    <div class="row">
                        <li>

                            <div class="column">
                                <label for="date">Date</label>
                                <input type="date">

                            </div>
                        </li>
                        <li>

                            <div class="column">
                                <label for="km">Km</label>
                                <input type="number">
                            </div>
                        </li>
                    </div>
                    <li>
                        <div class="column">
                            <button type="submit">Confirmer</button>
                        </div>
                    </li>
                </ul>
        </form>
    </div>

</div>