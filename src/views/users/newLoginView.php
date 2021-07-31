<?php get_header('S_inscrire', 'login') ?>
<div class="menu-login">
    <div class="new login">
        <form action="" method="post">
            <p class="parrafo-compte pa">Vous pouvez s'inscrire ici</p>
            <div class="pseudo">
                <?php $error = checkField('pseudo', 'Votre pseudo est vide.'); ?>
                <input type="text" class="email<?= $error['class']; ?>" id="pseudo" placeholder="Pseudo" name="pseudo" value="">
                <p class="message"> <?= $error['message']; ?> </p>
            </div>
            <div class="mail">
                <?php $duplo = searchEmail($db, $router) ?>
                <?php $error = checkField('email', 'Votre email est vide.'); ?>
                <input type="email" class="email<?= $error['class']; ?>" id="email" placeholder="Adresse email" name="email" value="">
                <p class="message"> <?= $error['message']; ?> </p>
                <p class="message"> <?= $duplo; ?> </p>
            </div>
            <div class="div">
                <p class="parrafo-compte">Mot de passe</p>
                <?php $error = checkField('password', 'Votre mot de passe est vide.'); ?>
                <input type="password" class="password<?= $error['class']; ?>" id="password" placeholder="Mot de passe" name="password" value="">
                <p> <?= $error['message']; ?></p>
            </div>
            <div class="div">
                <p class="parrafo-compte">Confirmez votre mot de passe</p>
                <?php $error = checkField('confirmerPassword', 'Votre mot de passe est vide.');
                $resul = egalPass('password', 'confirmerPassword') ?>
                <input type="password" class="password<?= $error['class']; ?>" id="confirmerPassword" placeholder="Confirmer le mot de passe" name="confirmerPassword" value="">
                <p> <?= $error['message']; ?></p>
            </div>
            <div class="nsubmit">
                <button class="button" type="submit">
                    <p>S'inscrire</p>
                </button>
            </div>
        </form>

    </div>
</div>
<?php get_footer('login'); ?>