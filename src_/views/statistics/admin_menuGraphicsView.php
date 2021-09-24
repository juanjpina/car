<?php get_header('menu totales', 'admin') ?>
<div class="statistics column">
    <h1 class='title'>Statistique</h1>
    <h3>Sélectionnez deux années différentes pour accéder aux graphiques comparatifs</h3>
    <form action="" method="post">
        <div>
            <div class="column">
                <label for="startYear">De l'année</label>
                <input type="number" name="startYear" class="input">
            </div>
        </div>
        <div>
            <div class="column">
                <label for="endYear">À l'année</label>
                <input type="number" name="endYear" class="input">
            </div>
        </div>

        <div>
            <div class="column">
                <input type='hidden' name="ok" value="ok">
                <button class='button' type="submit">Sauvegarder</button>
            </div>
        </div>

    </form>
</div>

<?php get_footer('admin') ?>