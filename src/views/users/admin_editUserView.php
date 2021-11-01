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
                            <?php $error = checkField('email', 'Votre pseudo est vide.'); ?>
                            <input class='input' maxlength="10" type="text" name="nickname" placeholder="<?= $x['nickname'] ?>">
                            <p class="message"> <?= $error['message']; ?> </p>
                    </div>
                </div>
                <div>
                    <div class="column">
                        <?php $error = checkField('email', 'Votre e-mail est vide.'); ?>

                        <?php $mail = checkEmail('email'); ?>
                        <label for="email">Votre email</label>
                        <input type="email" id="mc-email" name="email" placeholder="<?= $x['email'] ?>">
                        <p class="message"> <?= $error['message']; ?> </p>
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
<script src='src/assets/js/monCompte.js' type="text/javascript;version=1.8">
</script>
<!-- 
<script>
    let mcEmail = document.getElementById('mc-email')
    mcEmail.addEventListener("keyup", () => {
        let mail = mcEmail.value;
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "send");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded", true);
        xhr.send('mail=' + mail);
        xhr.onreadystatechange = function() {

            if (xhr.response !== 'ok') {
                mcEmail.style.border = '4px solid green';
            } else {
                mcEmail.style.border = '4px solid red';
            }

        }

    });

    console.log(45);
</script> -->
<?php get_footer('compte'); ?>