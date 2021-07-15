<?php get_header('Ajouter un film', 'admin'); ?>

<h1 class="mb-4">Ajouter un film</h1>

<form action="" method="post">
	<div class="mb-3">
		<label for="title" class="form-label">Catégoirese</label>
		<input type="text" class="form-control" id="title" name="categorie">
	</div>
	
	<div>
		<button type="submit" class="btn btn-success">Sauvegarder</button>
	</div>
</form>

<?php get_footer('admin'); ?>