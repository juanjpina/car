<?php get_header('pawforget', 'login'); ?>
<section class="column">
    <div class="pswforget column">
        <form action="" method="post">
            <div class="column">
                <h1 class="title">Mot de passe oublié</h1>
                <p>Vous ne rétrouvez plus votre mot de passe?</p>
                <p>Merci d'indiquer votre adresse e-mail de clicker sur "Envoyer",</p>
                <p>nous vous enverrons un e-mail avec une mot de passe.</p>
                <label for="mail">e-mail*</label>
                <input type="email" name='mail' placeholder="example@example.com" value="">
            </div>
            <div class="column">
                <input type='hidden' name='ok' value='ok'>
                <button class="button" type="submit">Envoyer</button>
            </div>
        </form>
        <p><?= $value; ?></p>
        <div>
            <a href="<?= $router->generate('login'); ?>">
                <div class="button">
                    <p>Login</p>
                </div>
            </a>
        </div>
    </div>
</section>
<?php get_footer('login'); ?>