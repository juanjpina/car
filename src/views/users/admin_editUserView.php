<?php get_header('edit data user', 'compte'); ?>
<div class="user">
    <div class="contained">
        <div class="column">
            <h3>Modifier votre données</h3>
        </div>
        <form action="" method="post">

            <div class="column form">
                <div class="column">
                    <?php $error = checkField('pseudo', 'Votre pseudo est vide.'); ?>
                    <label for="pseudo">Pseudo</label>
                    <input type="text" name="pseudo" value="<?= $_SESSION['auth']['nickname'] ?>">
                    <p class="message"> <?= $error['message']; ?> </p>
                </div>



                <div class="column">

                    <div class="column form">
                        <?php $error = checkField('password', 'Votre mot de passe est vide.'); ?>
                        <label for="password">Mot de pass</label>
                        <input type="password" class="password<?= $error['class']; ?>" name="password" value="<?= valueField('password'); ?>">
                        <p class="message"> <?= $error['message']; ?> </p>


                        <div class="column form">
                            <?php $error = checkField('confirmerPassword', 'Votre mot de passe est vide.'); ?>
                            <?php $resul = egalPass('password', 'confirmerPassword') ?>
                            <label for="password">Confirmez votre mot de pass</label>
                            <input type="password" class="password<?= $error['class']; ?>" name="confirmerPassword" value="<?= valueField('confiermerPassword'); ?>">
                            <p class="message"> <?= $error['message']; ?> </p>
                            <p> <?= $resul['message']; ?></p>
                        </div>
                    </div>



                    <div class="column form">
                        <button class="button" type="submit">Confirmer</button>
                    </div>


        </form>
    </div>
</div>