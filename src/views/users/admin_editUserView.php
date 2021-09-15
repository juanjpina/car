<?php get_header('edit data user', 'compte'); ?>
<div class="user">
    <div class="column">
        <h1 class="title">Modifier vos données</h1>
    </div>
    <div class="column ">
        <form action="" method="post">
            <ul>
                <li>
                    <div class="column">
                        <?php $error = checkField('nickname', 'Votre pseudo est vide.'); ?>
                        <label for="nickname">Pseudo</label>
                        <input class='input' type="text" name="nickname" placeholder="<?= searchEmail($db) ?>" value="">
                        <p class="message"> <?= $error['message']; ?> </p>
                    </div>
                </li>
                <div class="column">
                    <li>
                        <div class="column form">
                            <?php $error = checkField('password', 'Votre mot de passe est vide.'); ?>
                            <label for="password">Mot de passe</label>
                            <input type="password" class="input password<?= $error['class']; ?>" name="password" value="">
                            <p class="message"> <?= $error['message']; ?> </p>
                        </div>
                    </li>
                    <li>
                        <div class="column form">
                            <?php $resul = egalPass('password', 'confirmerPassword') ?>
                            <?php $error = checkField('confirmerPassword', 'Votre mot de passe est vide.'); ?>
                            <label for="password">Confirmez votre mot de passe</label>
                            <input type="password" class="input password<?= $error['class']; ?>" name="confirmerPassword" value="">
                            <p class="message"><?= $error['message']; ?> </p>
                            <p class="message"><?= $resul['message']; ?></p>


                        </div>
                    </li>
                </div>
                <li>
                    <div class="column form">
                        <button class="button" type="submit">Confirmer</button>
                    </div>
                </li>
            </ul>
        </form>
    </div>
</div>