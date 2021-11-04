<?php get_header('pawforget', 'login'); ?>
<section class="column">
    <div class="pswforget column">  
        <form action="" method="post">
            <div class="column">
                <label for="mail">e-mail</label>
                <input type="email" name='mail' placeholder="example@example.com" value="">
            </div>
            <div class="column">
                <input type='hidden' name='ok' value='ok'>
                <button class="button" type="submit">Sauvegarder</button>
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
<? get_footer('login'); ?>