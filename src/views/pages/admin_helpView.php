<?php get_header('execute ok', 'admin'); ?>
<section>
    <div class="help column ">
        <div class="banner column">
            <h1 class="title">Aide</h1>
            <div class="row">
            <p class="text">Bienvenue à agenda voiture M. Mme. <?= $_SESSION['auth']['nickname'];?>.<br>
             Ici vous pourrez gérer vos véhicules. Vous pouvez ajouter des véhicules de votre liste comme vous le souhaitez. Pour que vous compreniez mieux, vous pourrez visualiser les dernières interventions réalisées sur votre (ou vos si vous en possédez plusieurs) véhicule, mais aussi celles qui sont à venir. Mais pas seulement, vous pourrez aussi observer vos dépenses annuelles et les comparer aux années précédentes. Il suffira de remplir régulièrement les informations nécessaires, telles que les frais d’entretien, les factures, le kilométrage, etc.</p>
            </div>
            <div class="row">
                <img src="/src/assets/images/alerts.png" width="50" height="50" alt="rappel">
                <p>RAPPEL, ce service vous prévient des réparations à venir, comme la vidange, le changement de la courroie de distribution, ainsi que du control technique à travers un message à votre boîte mail. </p>
            </div>
            <div class="row">
                <img src="/src/assets/images/statistic.png" width="50" height="50" alt="statistique">
                <p>STATISTIQUE, ici vous trouverez les données statistiques de toutes les dépenses enregistrées dans « FRAIS ». Vous pourrez les voir selon différentes périodes (1, 2, 3 mois etc).</p>
            </div>
            <div class="row">
                <img src="/src/assets/images/facture3.png" width="50" height="50" alt="frais">
                <p>FRAIS, enregistrez et modifiez les différentes dépenses effectuées, comme le carburant, péages et les réparations. Il est important de bien enregistrer toutes les données afin de pouvoir avoir des statistiques le plus précises. </p>
            </div>
            <div class="row">
                <img src="/src/assets/images/history.png" width="50" height="50" alt="historique">
                <p>HISTORIQUE, accédez à l´historique de toutes les dépenses effectuées depuis le premier jour et sélectionnez la période que vous désirez consulter.</p>
            </div>
            <div class="row">
                <img src="/src/assets/images/carAdmin.png" width="50" height="50" alt="véhicule">
                <p>VÉHICULE, vous pourrez ajouter les véhicules selon vos désir et possessions, et accédez aux données de chacun.
                    Vous pouvez changer de véhicule pour afficher ses données.</p>
            </div>
            <div class="row end">
                <img src="/src/assets/images/man.png" width="50" height="50" alt="pseudo">
                <p>MON COMPTE, vous pouvez modifier les données d'achat du véhicule, et votre données d’inscription. </p>
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