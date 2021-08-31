<?php get_header('menu totales', 'admin') ?>
<div class="statistics column">
    <h1 class='title'>Statistique</h1>
    <h6>Sélectionnez une année pour acceder à la totalité des frais</h6>
    <form action="" method="post">
        <ul>
            <li>
                <div class="column">
                    <label for="year">L'année</label>
                    <input type="number" name="year" class="input">
                </div>
            </li>
            <li>
                <div class="column">
                    <input type='hidden' name="ok" value="ok">
                    <button class='button' type="submit">Sauvegarder</button>
                </div>
            </li>
        </ul>
    </form>
</div>
<?php get_footer('admin') ?>