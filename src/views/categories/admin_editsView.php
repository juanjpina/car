<?php get_header('Éditer une catégorie', 'admin'); ?>

<div class="row mb-5 align-items-center">
	<h1 class="col-9">Éditer une Catégorie</h1>
</div>

<form action="" method="post" enctype="multipart/form-data">
	<div class="mb-3">
		<?php $err = $ctrl->formValidate->getError('categorie'); ?>
		<label for="title" class="form-label">Categorie*</label>
		<input type="text" class="form-control<?= $err['class']; ?>" id="title" name="categorie" value="<?= $ctrl->getValue('categorie'); ?>">
		<?= $err['msg']; ?>
	</div>
	
	<div>
		<input type="hidden" name="id" value="<?= $ctrl->getValue('id'); ?>">
		<button type="submit" class="btn btn-success">Sauvegarder</button>
	</div>
</form>

<?php get_footer('admin'); ?>
