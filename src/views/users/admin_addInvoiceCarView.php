<?php get_header('InvoiceCar', 'compte') ?>




<div class="car">
    <div class="contained">
        <div class="select column">
            <h3>Modifier les données de votre véhicule</h3>
        </div>
        <form action="">
            <div class="data column">
                <div class="column">
                    <div class="periode column">
                        <select name="select">
                            <option value="value1">Value 1</option>
                            <option value="value2" selected>Value 2</option>
                            <option value="value3">Value 3</option>
                        </select>
                    </div>
                </div>
                <div class="row">

                    <div class="column">
                        <label for="date">Date</label>
                        <input type="date">

                    </div>
                    <div class="column">
                        <label for="km">Km</label>
                        <input type="number">
                    </div>
                </div>
                <div class="">
                    <button type="submit">Confirmer</button>
                </div>
        </form>
    </div>
</div>
</div>