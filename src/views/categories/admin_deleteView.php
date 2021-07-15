<?php get_header('Supprimer la categorie : ' . $currentCate->categorie, 'admin'); ?>

<h1>Supprimer la catégorie : <?= $currentCate->categorie; ?></h1>
<p>Êtes vous certain de vouloir supprimer définitivement cette catégorie ?</p>
<a href="<?= $router->generate('deleteCategories', ['id' => $_GET['id']]); ?>?confirm=1" class="btn btn-danger">Supprimer définitivement</a>

<?php get_footer('admin'); ?>
