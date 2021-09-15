<?php get_header('invoice menu', 'admin'); ?>
<div class='menuInvoice'>
    <ul>
        <div class='row'>
            <li>
                <a href="<?= $router->generate('addInvoice'); ?>">
                    <div class='column boton'>
                        <img src="/proyectocar/car/src/assets/images/facture3.png" width="30" height="30" alt="">
                        <p>Ajouter des frais</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?= $router->generate('editInvoice'); ?>">
                    <div class='column boton'>
                        <img src="/proyectocar/car/src/assets/images/edit.png" width="30" height="30" alt="">
                        <p>Modifier ou annuler des frais</p>
                    </div>
                </a>
            </li>
        </div>
    </ul>
</div>
<?php get_footer('admin'); ?>