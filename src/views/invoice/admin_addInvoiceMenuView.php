<?php get_header('invoice add', 'admin'); ?>


<div class='menuInvoice'>
    <ul>
        <li class='boton'>
            <a href="<?= $router->generate('addInvoice'); ?>">
                <div>
                    <p>Ajouter les factures</p>

                </div>
            </a>


        </li>
        <li class='boton'>
            <a href="<?= $router->generate('editalerts'); ?>">
                <div>

                    <p>Modifier ou annuler les factures</p>
                </div>
            </a>

        </li>

    </ul>


</div>
















<?php get_footer('admin'); ?>