<?php get_header('Mon super site de film'); ?>

<section id="list-home">
	<h1 class="title-primary">
		<span>Liste des films</span>
	</h1>

	<ul id="movies">
		<?php foreach ($movies as $movie) { ?>
			<li>
				<a href="" class="image">
					<img src="<?= $movie->poster; ?>" alt="Affiche <?= $movie->title; ?>">
				
					<div class="legend">
						<h2 class="title"><?= $movie->title; ?></h2>
						<p>Spectateurs : <?= $movie->viewer; ?></p>
						<p>Date de sortie : <?= dateFormat($movie->released); ?></p>
					</div>
				</a>
			</li>
		<?php } ?>
	</ul>
</section>

<?php get_footer(); ?>