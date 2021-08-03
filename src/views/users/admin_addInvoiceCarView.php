<?php get_header('InvoiceCar', 'compte') ?>
<div class="car">
    <div class="contained column">
        <div class="select column">
            <h3>Modifier les données de votre véhicule</h3>
        </div>
        <form action="" method="post">
            <div class="column">
                <ul>
                    <li>
                        <div class="columns">
                            <select name="select" id="select_car" onchange="click()">
                                <?php foreach ($cars as $car) { ?>
                                    <option value='<?= $car['id_car']; ?>'><?= $car['trademark']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="column ">
                            <button type="submit">Confirmer</button>
                        </div>
                    </li>
                </ul>
            </div>
        </form>
        <div class="column">
            <form action="" method="post">
                <ul>
                    <div class=" column">
                        <!-- <select name="select"> -->
                        <?php for ($i = 0; $i < count($types); $i++) { ?>
                            
                            <li>
                                <p form='<?= $types[$i]['function']; ?>'><?= $types[$i]['type_data']; ?></p>
                            
                                <div class="row">
                            
                                 <?php if (($types[$i]['function']) == 1) { 
                                        $var = 2;
                                 }elseif( ($types[$i]['function']) == 2 ){

                                         }
                                        }
                                         ?>
                            
                                    <?php foreach ($buy as $x) { ?>
                            
                                        <div class="column">
                                                <label for="date">Date</label>
                                                <input type="date" name='date<?= $i + 1; ?> ' value="<?= $x['date']     ?>">
                                        </div>
                                        <div class="column">
                                                <label for="km">Km</label>
                                                <input type="number" name='km<?= $i + 1; ?>' value="<?= $x['km']     ?>">
                                        </div>
                                    <?php } ?>   
                                      
                                                    

                                 <?php } ?>
                                      
                                </div>
                            
                            </li>
                    <?php } ?>
            
            
                    </div>
                    <!-- </select> -->
                    <li>
                        <div class="column">
                            <button type="submit">Confirmer</button>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>