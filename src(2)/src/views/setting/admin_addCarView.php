<?php get_header('Add New Car', 'admin'); ?>
<section>
    <div class="addCar column">
        <div class="column">
            <h1 class="title">Ajouter un nouveau véhicule</h1>
            <h6>Ajoutez une identification pour votre véhicule</h6>
        </div>
        <form action="" method="post">
            <div class="column">
                <?php $error = checkField('trademark', 'Votre marque est vide.'); ?>
                <label for="trademark" class="formLabel">Votre véhicule</label>
                <input type="text" class="input" id="trademark" name="trademark">
                <?= $error['message']; ?>
            </div>
            <div class="column">
                <button type="submit" class="button">Ajouter</button>
            </div>
        </form>
    </div>
</section>
<?php get_footer('admin'); ?>