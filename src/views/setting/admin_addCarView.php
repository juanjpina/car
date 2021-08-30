<?php get_header('Add New Car', 'admin'); ?>
<div class="addCar column">
    <h1 class="title">Ajouter un nouveau véhicule</h1>
    <ul>
        <form action="" method="post">
            <li>
                <div class="column">
                    <?php $error = checkField('trademark', 'Votre marque est vide.'); ?>
                    <label for="trademark" class="formLabel">La marque de votre véhicule</label>
                    <input type="text" class="input" id="trademark" name="trademark">
                    <?= $error['message']; ?>
                </div>
            </li>
            <li>
                <div class="column">
                    <button type="submit" class="button">Sauvegarder</button>
                </div>
            </li>
        </form>
    </ul>
</div>
<?php get_footer('admin'); ?>