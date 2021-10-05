<?php get_header('S_inscrire', 'login') ?>
<section>
    <div class="menu-login column ">
        <div class="newLogin">
            <form action="" method="post">
                <div class="pseudo column">
                    <?php $error = checkField('pseudo', 'Votre pseudo est vide.'); ?>
                    <label for="pseudo">Votre pseudo</label>
                    <input type="text" class=" input email<?= $error['class']; ?>" id="pseudo" placeholder="Pseudo" name="pseudo" value="">
                    <p class="message"> <?= $error['message']; ?> </p>
                </div>
                <div class="mail column">
                    <?php $duplo = searchEmail($db, $router) ?>
                    <?php $error = checkField('email', 'Votre email est vide.'); ?>
                    <?php $mail = checkEmail('email'); ?>
                    <label for="email">Votre e-mail</label>
                    <input type="email" class=" input email<?= $error['class']; ?>" id="email" placeholder="Adresse email" name="email" value="">
                    <p class="message"> <?= $error['message']; ?> </p>
                    <p class="message"> <?= $duplo; ?> </p>
                    <p class="message"> <?= $mail['message']; ?> </p>
                </div>
                <div class="div column">
                    <?php $verification = messagePassword('password'); ?>
                    <?php $error = checkField('password', 'Votre mot de passe est vide.'); ?>
                    <label for="password">Votre mot de passe</label>
                    <input type="password" class="input password<?= $error['class']; ?>" id="password" placeholder="Mot de passe" name="password" value="">
                    <p class='textPassword'>La mot de passe doit contenir une majuscule et plus de 8 caractères</p>
                    <p> <?= $error['message']; ?></p>
                    <p><?= $verification; ?></p>

                </div>
                <div class="div column">
                    <?php $password = addUser($db, $router); ?>
                    <p class="parrafo-compte">Confirmez votre mot de passe</p>
                    <?php $error = checkField('confirmerPassword', 'Votre mot de passe est vide.');
                    $resul = egalPass('password', 'confirmerPassword') ?>
                    <input type="password" class="input password<?= $error['class']; ?>" id="confirmerPassword" placeholder="Confirmer le mot de passe" name="confirmerPassword" value="">
                    <p> <?= $error['message']; ?></p>
                    <p> <?= $password; ?></p>
                </div>
                <div class="column">
                    <button class="button submit" type="submit">
                        <p>S'inscrire</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php get_footer('login'); ?>