<?php get_header('edit data user', 'compte'); ?>
<section>
    <div class="user pass">
        <a class="closed" href="<?= $router->generate('white') ?>"><img src="/car/src/assets/images/closed.png" width="25" height="25" title="Fermer" alt="Fermer"></a>
        <div class="column">
            <h1 class="title">Modifier vos données</h1>
        </div>
        <div class="column">
            <form action="" method="post">
                <div>
                    <div class="column">
                        <label for="password">Mot de passe</label>
                        <p class='textPassword'>Le mot de passe doit contenir au moins une majuscule, une minuscule, un numéro, un caractère spécial et plus de 10 caractères et moins de 16 caractères</p>
                        <input id="mcPass" type="password" maxlength="16" class="input password" name="password" value="">
                        <p id="mcMessagePass" class="message"></p>
                    </div>
                </div>
                <div>
                    <div class="column">
                        <label for="password">Confirmez votre mot de passe</label>
                        <input id="mcConfPass" type="password" maxlength="16" class="input password>" name="confirmerPassword" value="">
                    </div>
                </div>
                <div>
                    <div class="column">
                        <input type="hidden" value="ok" name="ok">
                        <button class="button" type="submit">Sauvegarder</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="/car/src/assets/js/inputPasswordMC.js"></script>
<?php get_footer('compte'); ?>