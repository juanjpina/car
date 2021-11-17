<?php get_header('S_inscrire', 'login') ?>
<section>
    <div class="menu-login column ">
        <div class="newLogin column">
            <form action="" method="post" name="NLform">
                <div class="pseudo column">
                    <?php $pseudo = lengthPseudo('pseudo'); ?>
                    <label for="pseudo">Pseudo*</label>
                    <input type="text" maxlength="10" class=" input" id="NLpseudo" placeholder="Pseudo - maximum 10 caractères " name="pseudo" value="">
                    <p class="message" id="pseudoMessage"></p>
                    <p class="message"> <?= $pseudo; ?> </p>
                </div>
                <div class="mail column">
                    <?php $message = searchEmail($db, $router); ?>
                    <?php $mail = checkEmail('email'); ?>
                    <label for="email">Adresse e-mail*</label>
                    <input type="email" class="input email" id="NLemail" placeholder="Adresse e-mail" name="email" value="">
                    <p class="message" id="emailMessage"></p>
                    <p class="message"> <?= $message; ?> </p>
                    <p class="message"> <?= $mail['message']; ?> </p>
                </div>
                <div class="password column">
                    <label for="password">Mot de passe*</label>
                    <p class='textPassword'>Le mot de passe doit contenir au moins une majuscule, une minuscule, un nombre, un caractère spécial et plus de 10 caractères et moins de 16 caractères</p>
                    <input type="password" maxlength="16" id="NLpassword" placeholder="mot de passe" name="password">
                    <p class="message" id="passwordMessage"></p>
                </div>
                <div class="conf-password column">
                    <p class="parrafo-compte">Confirmez le mot de passe*</p>
                    <input type="password" maxlength="16" id="NLconfirmPassword" placeholder="Confirmer la mot de passe" name="confirmerPassword">
                    <p class="message" id="confirmPasswordMessage"></p>
                </div>
                <div class="column div-button">
                    <button class="button submit" type="submit" name='submit'>
                        <p>Je m'inscris</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
<script src='src/assets/js/checkMail.js' type='module'></script>
<script src='src/assets/js/inputNullNewLogin.js' type='module'></script>
<?php get_footer('login'); ?>