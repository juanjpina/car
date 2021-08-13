<?php get_header('Alerts edit', 'admin'); ?>
<div class="alerts">
    <div class="contained column">


        <div class="">
            <h1 class='title'>Rappel editar</h1>
        </div>
        <ul>
            <form action="" method="post">
                <li>
                    <select name='car'>
                        <?php foreach ($cars as $car) { ?>
                            <option value="<?= $car['id_car'] ?>"><?= $car['trademark']; ?></option>
                        <?php } ?>
                    </select>
                </li>


                <li>
                    <button type="submit" class='button'>Sauvergarder</button>
                </li>


            </form>
        </ul>
        <img src="/proyectocar/car/src/assets/images/add.png" width="25" height="25" alt="">



    </div>

</div>












<?php get_footer('admin'); ?>