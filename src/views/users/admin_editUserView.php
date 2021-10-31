<?php get_header('edit data user', 'compte'); ?>
<section>
    <div class="user">
        <a class="closed" href="<?= $router->generate('white') ?>"><img src="/car/src/assets/images/closed.png" width="25" height="25" title="Fermer" alt="Ferme"></a>
        <div class="column">
            <h1 class="title">Modifier vos données</h1>
        </div>
        <div class="column ">
            <form action="" method="post">
                <div>
                    <div class="column">
                        <label for="nickname">Pseudo</label>
                        <?php foreach ($result as $x) { ?>
                            <input class='input' maxlength="10" type="text" name="nickname" value="<?= $x['nickname'] ?>">
                    </div>
                </div>
                <div>
                    <div class="column">
                        <?php $check =  checkModifEmail($db, $router); ?>
                        <?php $mail = checkEmail('email'); ?>
                        <label for="email">Votre email</label>
                        <input type="email" name="email" value="<?= $x['email'] ?>">
                        <p class="message"> <?= $mail['message']; ?> </p>
                        <p class="message"> <?= $check; ?> </p>

                    <?php } ?>
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