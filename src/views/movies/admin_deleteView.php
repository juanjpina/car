<?php get_header('Supprimer la categorie : ' . $currentMovie->title, 'admin'); ?>

<h1>Supprimer le film : <?= $currentMovie->title; ?></h1>
<p>Êtes vous certain de vouloir supprimer définitivement ce film ?</p>
<a href="<?= $router->generate('deleteMovie', ['id' => $_GET['id']]); ?>?confirm=1" class="btn btn-danger">Supprimer définitivement</a>

<?php get_footer('admin'); ?>
