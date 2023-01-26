<?php get_header('Add New Car', 'admin'); ?>
<section>
    <div class="addCar column">
    <a class="closed" href="<?= $router->generate('white') ?>"><img src="/car/src/assets/images/closed.png" width="25" height="25" title="Fermer" alt="Fermer"></a>
        <div class="column">
            <h1 class="title">Ajouter un nouveau véhicule</h1>
            <h6>Ajoutez une identification pour votre véhicule</h6>
        </div>
        <form action="" method="post">
            <div class="column">
                <?php $error = checkField('trademark', 'Votre marque est vide.'); ?>
                <label for="trademark" class="formLabel">Votre véhicule</label>
                <input type="text" class="input" id="trademark" name="trademark">
                  <p class="error"> <?= $error['message'];  ?></p>
            </div>
            <div class="column">
                <button type="submit" class="button">Ajouter</button>
            </div>
        </form>
    </div>
</section>
<?php get_footer('admin'); ?>