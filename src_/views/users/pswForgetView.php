<?php get_header('pawforget', 'login'); ?>

<div class="pswforget">
    <div class="container column">
        <form action="" method="post">

            <div>

                <label for="mail">e-mail</label>
                <input type="email" name='mail' placeholder="example@example.com" value="">

            </div>
            <div class="column">

                <input type='hidden' name='ok' value='ok'>
                <button class="button" type="submit">Sauvegarder</button>

            </div>

        </form>
        <p>Vous avez reçu un e-mail avec la nouvelle mot de passe.</p>
    </div>
</div>
<? get_footer('login'); ?>