<?php get_header('execute ok', 'admin'); ?>
<section>
    <div class="help column ">
        <div class="banner column">
            <h1 class="title">Aide</h1>
            <div class="row">
            <p class="text">Bienvenue à agenda voiture M. Mme. <?= $_SESSION['auth']['nickname'];?>.<br>
             Ici vous pourrez gérer vos véhicules. Vous pouvez ajouter ou supprimer des véhicules de votre liste comme vous le souhaitez. Pour que vous compreniez mieux, vous pourrez visualiser les dernières interventions réalisées sur votre (ou vos si vous en possédez plusieurs) véhicule, mais aussi celles qui sont à venir. Mais pas seulement, vous pourrez aussi observer vos dépenses annuelles et les comparer aux années précédentes. Il suffira de remplir régulièrement les informations nécessaires, telles que les frais d’entretien, les factures, le kilométrage, etc.</p>
            </div>
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
                <a href="<?= $router->generate('white'); ?>">
                    <div class="button">
                        <p>Commencez</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<?php get_footer('admin'); ?>