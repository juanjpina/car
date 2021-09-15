<?php get_header('Accueil', 'login') ?>

Bonjour <?= $_SESSION['auth']['email']; ?>

<div class="accueil">
    <div class="texto">
        <p>Bienvenue sur notre site. Ici vous pourrez gérer vos véhicules. Vous pouvez ajouter ou supprimer des véhicules de votre liste comme vous le souhaitez. Pour que vous comprenez mieux, vous pourrez visualiser les dernières interventions réalisées sur votre (ou vos si vous en possédez plusieurs) véhicule, mais aussi celles qui sont à venir. Non seulement, vous pourrez aussi observer vos dépenses annuelles et les comparer aux années précédentes. Il suffira de remplir régulièrement les informations nécessaires, telles que les frais d’entretien, les factures, le kilométrage, etc.</p>
        <div class="continuer">
            <a href="<?= $router->generate('addnewcar'); ?>">Vous pouvez continuer, merci</a>
        </div>

    </div>
</div>

<?php get_footer('login') ?>