<?php get_header('feul', 'admin'); ?>
<div class='fuel'>
    <div class="column">
        <h1 class="title">Carburant</h1>
        <h6>Vous devriez segnaler le kilometrage à partir se queda grabado para contabilizr en consumo.</h6>
    </div>
    <div class="column">

        <form action="" method="post">


            <div class="column">

                <label for='km'>KM</label>
                <?php foreach ($fuel as $ful) { ?>
                    <input type="number" name='km' value="" placeholder="<?= $ful['km'] ?>">
                <?php } ?>
            </div>



            <div>

                <button class="button" type="submit">Sauvegarder</button>

            </div>


        </form>


    </div>


</div>









<?php get_footer('admin'); ?>