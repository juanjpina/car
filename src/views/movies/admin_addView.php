<?php get_header('Ajouter un film', 'admin'); ?>

<h1 class="mb-4">Ajouter un film</h1>

<form action="" method="post">
	<div class="mb-3">
		<label for="title" class="form-label">Titre</label>
		<input type="text" class="form-control" id="title" name="title">
	</div>
	<div class="mb-3">
		<label for="viewer" class="form-label">Nombre de spectateurs</label>
		<input type="number" class="form-control" id="viewer" name="viewer">
	</div>
	<div class="mb-3">
		<label for="released" class="form-label">Date de diffusion</label>
		<input type="text" class="form-control" id="released" placeholder="Exemple: 2020/12/25"  name="released">
		<div class="form-text">Format : AAAA-MM-JJ</div>
	</div>
	<div class="mb-3">
		<label for="runtime" class="form-label">Durée</label>
		<input type="number" class="form-control" id="runtime" name="runtime">
		<div class="form-text">En minute</div>
	</div>
	<div>
		<button type="submit" class="btn btn-success">Sauvegarder</button>
	</div>
</form>

<?php get_footer('admin'); ?>