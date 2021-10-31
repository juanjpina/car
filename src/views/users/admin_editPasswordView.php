<?php get_header('edit data user', 'compte'); ?>
<section>
    <div class="user">
    <a class="closed" href="<?= $router->generate('white') ?>"><img src="/car/src/assets/images/closed.png" width="25" height="25" title="Fermer" alt="Ferme"></a>
        <div class="column">
            <h1 class="title">Modifier vos données</h1>
        </div>
        <div class="column">
            <form action="" method="post">
                <div>
                    <div class="column">
                        <?php $verification = messagePassword('password'); ?>
                        <label for="password">Mot de passe</label>
                        <p class='textPassword'>Le mot de passe doit contenir au moins une majuscule et plus de 8 caractères</p>
                        <input type="password" maxlength="16" class="input password" name="password" value="">
                        <p class="message"><?= $verification; ?></p>
                    </div>
                </div>
                <div>
                    <div class="column">
                        <?php $resul = egalPass('password', 'confirmerPassword') ?>
                        <?php $error = checkField('confirmerPassword', 'Votre mot de passe est vide.'); ?>
                        <label for="password">Confirmez votre mot de passe</label>
                        <input type="password" maxlength="16" class="input password<?= $error['class']; ?>" name="confirmerPassword" value="">
                        <p class="message"><?= $error['message']; ?> </p>
                        <p class="message"><?= $resul['message']; ?></p>
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
<?php get_footer('compte'); ?>