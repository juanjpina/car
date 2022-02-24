<?php get_header('invoice menu', 'admin'); ?>
<section>
    <div class='menuInvoice row'>
        <ul>
            <div class='row'>
                <li>
                    <a href="<?= $router->generate('addInvoice'); ?>">
                        <div class='column boton'>
                            <img src="/car/src/assets/images/facture3.png" width="30" height="30" alt="">
                            <p>Ajouter les frais</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?= $router->generate('editInvoice'); ?>">
                        <div class='column boton'>
                            <img src="/car/src/assets/images/edit.png" width="30" height="30" alt="">
                            <p>Modifier ou annuler les frais</p>
                        </div>
                    </a>
                </li>
            </div>
        </ul>
    </div>
</section>
<?php get_footer('admin'); ?>