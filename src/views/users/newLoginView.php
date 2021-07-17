<?php get_header('S_inscrire', 'login') ?>

etienne@mail.com
mdp
<div class="menu-login">
    <div class="login">
        <form action="" method="post">
            <p class="parrafo-compte">Vous pouvez s'inscrire ici</p>
            <div class="mail">
                <?php $error = checkField('login', 'Votre email est vide.'); ?>
                <input type="email" class="email<?= $error['class']; ?>" id="email" placeholder="Adresse email" name="login" value="<?= valueField('login'); ?>">
                <p class="message"> <?= $error['message']; ?> </p>
            </div>

            <div class="div">
                <p class="parrafo-compte">Mot de passe</p>
                <?php $error = checkField('password', 'Votre mot de passe est vide.'); ?>
                <input type="password" class="password<?= $error['class']; ?>" id="password" placeholder="Mot de passe" name="password" value='Mot de passe'>
                <?= $error['message']; ?>
            </div>

            <div class="div">
                <p class="parrafo-compte">Confirmez votre mot de passe</p>
                <?php $error = checkField('password', 'Votre mot de passe est vide.'); ?>
                <input type="password" class="password<?= $error['class']; ?>" id="ConfirmerPassword" placeholder="Confirmer le mot de passe" name="ConfirmerPassword" value='Mot de passe'>
                <?= $error['message']; ?>
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