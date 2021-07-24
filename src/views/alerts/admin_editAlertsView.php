<?php get_header('Alerts edit', 'admin'); ?>


<div class="alerts">
    <div class="contained">

        <form action="">

            <div class="select column">
                <h3>Rappel editar</h3>
            </div>
            <div class="data row">
                <a href="<?= $router->generate('addalerts'); ?>">
                    <div class="conf row">
                        <p>Ajoter un rappel</p>
                        <img src="/proyectocar/car/src/assets/images/add.png" width="25" height="25" alt="">
                    </div>
                </a>


            </div>
    </div>

</div>

</form>

</div>
</div>










<?php get_footer('admin'); ?>