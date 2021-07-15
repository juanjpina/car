<?php get_header('Ajouter un utilisateur', 'admin'); ?>

<h1 class="mb-4">Ajouter un utilisateur</h1>

<form action="" method="post">
	<div class="mb-3">
		<label for="title" class="form-label">E-mail</label>
		<input type="text" class="form-control" id="title" name="email">
	</div>
	<div class="mb-3">
		<label for="viewer" class="form-label">Password</label>
		<input type="password" class="form-control" id="viewer" name="pass">
	</div>
	<div>
		<button type="submit" class="btn btn-success">Sauvegarder</button>
	</div>
</form>

<?php get_footer('admin'); ?>