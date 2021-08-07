<?php get_header('edit data user', 'compte'); ?>
<div class="user">
    <div class="">
        <div class="column">
            <h3 class="h3Car">Modifier votre données</h3>
        </div>
        <form action="" method="post">

            <div class="column ">

                <div class="column">
                    <?php $error = checkField('nickname', 'Votre pseudo est vide.'); ?>
                    <label for="nickname">Pseudo</label>
                    <input class='input' type="text" name="nickname" value="<?= searchEmail($db) ?>">
                    <p class="message"> <?= $error['message']; ?> </p>
                </div>



                <div class="column">

                    <div class="column form">
                        <?php $error = checkField('password', 'Votre mot de passe est vide.'); ?>
                        <label for="password">Mot de pass</label>
                        <input type="password" class="password<?= $error['class']; ?>" name="password" value="<?= valueField('password'); ?>">
                        <p class="message"> <?= $error['message']; ?> </p>
                    </div>

                    <div class="column form">
                        <?php $error = checkField('confirmerPassword', 'Votre mot de passe est vide.'); ?>
                        <?php $resul = egalPass('password', 'confirmerPassword') ?>
                        <label for="password">Confirmez votre mot de pass</label>
                        <input type="password" class="password<?= $error['class']; ?>" name="confirmerPassword" value="">
                        <p class="message"> <?= $error['message']; ?> </p>
                        <p class="message"> <?= $resul['message']; ?></p>
                    </div>
                </div>



                <div class="column form">
                    <button class="button" type="submit">Confirmer</button>
                </div>


        </form>
    </div>
</div>