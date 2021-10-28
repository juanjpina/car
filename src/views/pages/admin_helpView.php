<?php get_header('execute ok', 'admin'); ?>
<section>
    <div class="help column ">
        <div class="banner column">
            <h1 class="title">Aider</h1>
            <div class="row">
                <img src="/car/src/assets/images/alerts.png" width="50" height="50" alt="rappel">
                <p>RAPPEL Ce service vous prévient des réparations à venir, comme la vidange, le changement de la courroie de distribution, ainsi que du control technique à travers un message à votre boîte mail. </p>
            </div>
            <div class="row">
                <img src="/car/src/assets/images/statistic.png" width="50" height="50" alt="statistique">
                <p>STATISTIQUE Ici vous trouverez les données statistiques de toutes les dépenses enregistrées dans « FRAIS ». Vous pourrez les voir selon différentes périodes (1, 2, 3 mois etc).</p>
            </div>
            <div class="row">
                <img src="/car/src/assets/images/facture3.png" width="50" height="50" alt="frais">
                <p>FRAIS Enregistrez et modifiez les différentes dépenses effectuées, comme le carburant, péages et les réparations. Il est important de bien enregistrer toutes les données afin de pouvoir avoir des statistiques le plus précises. </p>
            </div>
            <div class="row">
                <img src="/car/src/assets/images/history.png" width="50" height="50" alt="historique">
                <p>HISTORIQUE Accédez à l´historique de toutes les dépenses effectuées depuis le premier jour et sélectionnez la période que vous désirez consulter.</p>
            </div>
            <div class="row">
                <img src="/car/src/assets/images/carAdmin.png" width="50" height="50" alt="véhicule">
                <p>VÉHICULE Faites un inventaire de tous les véhicules que vous possédez (vous pourrez en rajouter selon vos désir et possessions) et accédez aux données de chacun (frais, réparations, etc.)</p>

            </div>
            <div class="row">
                <img src="/car/src/assets/images/man.png" width="30" height="30" alt="pseudo">
                <p>Mon compte</p>
            </div>

            <div class="begin">
                <a href="<?= $router->generate('whiteHome'); ?>">
                    <div class="button">
                        <p>Commencez</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<?php get_footer('admin'); ?>