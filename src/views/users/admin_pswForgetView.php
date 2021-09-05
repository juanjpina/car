<?php get_header('paw forget', 'admin'); ?>

<div class="pswforget column">

    <div>
        <ul class="column">

            <form action="" method="submit">

                <div>
                    <li class="column">
                        <label for="mail">e-mail</label>
                        <input type="email" name='mail' value='' placeholder="example@example.com">
                    </li>
                </div>
                <div class="column">
                    <li>
                        <button class="button submit" type="submit">Sauvegarder</button>
                    </li>
                </div>


            </form>
        </ul>

    </div>


    <p>Vous avez reçu un e-mail avec la nouvelle mot de passe.</p>




</div>








<? get_footer('admin'); ?>