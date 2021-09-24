<?php get_header('statistics add', 'admin'); ?>

<div class="statistics column">
    <h1 class='title'>Statistique</h1>
    <h6>Sélectionnez une période pour accéder aux données des frais</h6>
    <form action="" method="post">
            <div class="column">
                <div class="column period">
                    <h3>Périodes</h3>
                    <select name="period" class='select'>
                        <option value="0">Périodes</option>
                        <option value="1">Un dernier mois</option>
                        <option value="3">Trois dernier mois</option>
                        <option value="6">Six dernier mois</option>
                        <option value="9">Neuf dernier mois</option>
                        <option value="12">Douce dernier mois</option>
                        <option value="24">Veint-quatre dernier mois</option>
                    </select>
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
<?php get_footer('admin'); ?>