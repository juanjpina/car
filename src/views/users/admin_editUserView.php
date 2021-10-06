<?php get_header('edit data user', 'compte'); ?>
<section>
    <div class="user">
        <div class="column">
            <h1 class="title">Modifier vos données</h1>
        </div>
        <div class="column ">
            <form action="" method="post">

                <div>
                    <div class="column">
                        <label for="nickname">Pseudo</label>
                        <?php foreach ($result as $x) { ?>
                            <input class='input' type="text" name="nickname" value="" placeholder="<?= $x['nickname'] ?>">
                    </div>
                </div>
                <div>
                    <div class="column">
                        <?php $mail = checkEmail('email'); ?>
                        <label for="email">Votre email</label>
                        <input type="email" name="email" value="" placeholder="<?= $x['email'] ?>">
                        <p class="message"> <?= $mail['message']; ?> </p>
                    <?php } ?>
                    </div>
                </div>
                <div>
                    <div class="column form">
                        <?php $verification = messagePassword('password'); ?>
                        <label for="password">Mot de passe</label>
                        <input type="password" class="input password" name="password" value="">
                        <p class='textPassword'>Le mot de passe doit contenir au moins une majuscule et plus de 8 caractères</p>
                        <p class="message"><?= $verification; ?></p>

                    </div>
                </div>
                <div>
                    <div class="column form">
                        <?php $resul = egalPass('password', 'confirmerPassword') ?>
                        <?php $error = checkField('confirmerPassword', 'Votre mot de passe est vide.'); ?>
                        <label for="password">Confirmez votre mot de passe</label>
                        <input type="password" class="input password<?= $error['class']; ?>" name="confirmerPassword" value="">
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