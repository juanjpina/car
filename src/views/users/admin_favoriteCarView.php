<?php get_header('favorite car', 'compte'); ?>
<section>
    <div class="user">
        <a class="closed" href="<?= $router->generate('white') ?>"><img src="/src/assets/images/closed.png" width="25" height="25" title="Fermer" alt="Fermer"></a>
        <div class="column">
            <h1 class="title">Ma voiture préféree</h1>
            <h2><?php echo $trademark; ?></h2>
        </div>
        <div class="column ">
            <form action="" method="post">
                <div>
                    <div class="column">
                        <label for="nickname">Voiture</label>
                        <select name='car' class="select">
                            <?php foreach ($car as $cars) { ?>
                                <option value="<?= $cars['id_car'] ?>"><?= $cars['trademark'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
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