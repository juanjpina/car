<?php get_header('Accueil', 'admin') ?>

<h1 class="mb-4">
	Bonjour <?= $_SESSION['auth']['username']; ?>
</h1>

<div class="row">
	<ul class="list-group col-md-6 col-sm-12">
		<li class="list-group-item active">
			<h2 class="fs-5">Les derniers films</h2>
		</li>
		<?php foreach (getLastMovies($db) as $movie) : ?>
			<li class="list-group-item"><?= $movie->title; ?></li>
		<?php endforeach; ?>
	</ul>

	<ul class="list-group col-md-6 col-sm-12">
		<li class="list-group-item active">
			<h2 class="fs-5">Les derniers utilisateurs</h2>
		</li>
		<?php foreach (getLastUsers($db) as $user) : ?>
			<li class="list-group-item"><?= $user->email; ?></li>
		<?php endforeach; ?>
	</ul>
</div>


<?php get_footer('admin') ?>
