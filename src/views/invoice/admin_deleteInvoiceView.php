<?php get_header('deleteInvoice', 'admin') ?>

<div class='conta column'>
    <div class="deleteInvoice">
        <form action="" action="get">
            <ul class='column'>

                <li>

                    <label form='delete'>Êtes vous certain de vouloir supprimer définitivement ce facture ?</label>
                    <input type="hidden" name="delete" value="ok">

                </li>

                <li>
                    <button class='button' type="submit">Je suis d' accord</button>

                </li>
            </ul>
        </form>

    </div>



</div>
























<?php get_footer('admin');
