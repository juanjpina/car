<?php get_header('edit statistics', 'compte'); ?>


<div class="user">
    <div class="contained">
        <div class="select column">
            <h3>Modifier votre données</h3>
        </div>
        <form action="">
            <div class="data column">
                <p>Quand il faut changer la courrois de distribution</p>
                <div class="column">
                    <label for="km">Km</label>
                    <input type="number" name="km">
                </div>
                <div class="colum">
                    <label for="annes">Années</label>
                    <input type="date" name="date">
                </div>
            </div>

            <div class="row">

                <div class="column">
                    <p>Quand il faut faire la vidange</p>

                </div>
                <div class="column">
                    <label for="km">Km</label>
                    <input type="number" name="km">
                </div>
            </div>
            <div class="">
                <button type="submit">Confirmer</button>
            </div>
        </form>
    </div>
</div>
</div>














<?php get_footer('compte'); ?>