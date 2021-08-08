<?php get_header('edit statistics', 'compte'); ?>

<div class="userStatistics column">
    <div class="column">
        <div class="column as">
            <h1 class='h1Title'>Modifier votre données</h1>
        </div>
        <form action="">
            <ul>
                <li class="liStatis">
                    <p>Quand il faut changer la courrois de distribution</p>
                    <div class="row">
                        <div class="column">
                            <label for="date">Années</label>
                            <input type="date" class="input" name="date">
                        </div>
                        <div class="column">
                            <label for="km">Km</label>
                            <input type="number" class='input' name="km">
                        </div>
                    </div>
                </li>
                <li class="liStatis">
                    <div class="column">
                        <div class="column">
                            <p>Quand il faut faire la vidange</p>
                        </div>
                        <div class="column">
                            <label for="km">Km</label>
                            <input class="input" type="number" name="km">
                        </div>
                    </div>
                </li>
                <li class="liStatis ">
                    <div class="column ">
                        <button class='button buttonStatis' type="submit">Confirmer</button>
                    </div>
                </li>
            </ul>
        </form>
    </div>
</div>
</div>
<?php get_footer('compte'); ?>