<?php get_header('Éditer un film', 'admin'); ?>

<div class="row mb-5 align-items-center">
	<h1 class="col-9">Éditer un film</h1>
</div>

<form action="" method="post" enctype="multipart/form-data">
	<div class="mb-3">
		<?php $err = $ctrl->formValidate->getError('title'); ?>
		<label for="title" class="form-label">Titre*</label>
		<input type="text" class="form-control<?= $err['class']; ?>" id="title" name="title" value="<?= $ctrl->getValue('title'); ?>">
		<?= $err['msg']; ?>
	</div>
	<div class="mb-3">
		<?php $err = $ctrl->formValidate->getError('viewer'); ?>
		<label for="viewer" class="form-label">Nombre de spectateurs*</label>
		<input type="number" class="form-control<?= $err['class']; ?>" id="viewer" name="viewer" value="<?= $ctrl->getValue('viewer'); ?>">
		<?= $err['msg']; ?>
	</div>
	<div class="mb-3">
		<?php $err = $ctrl->formValidate->getError('released'); ?>
		<label for="released" class="form-label">Date de diffusion*</label>
		<input type="text" class="form-control<?= $err['class']; ?>" id="released" placeholder="Exemple: 2020-12-25"  name="released" value="<?= $ctrl->getValue('released'); ?>">
		<div class="form-text">Format : AAAA-MM-JJ</div>
		<?= $err['msg']; ?>
	</div>
	<div class="mb-3">
		<?php $err = $ctrl->formValidate->getError('runtime'); ?>
		<label for="runtime" class="form-label">Durée</label>
		<input type="number" class="form-control<?= $err['class']; ?>" id="runtime" name="runtime" value="<?= $ctrl->getValue('runtime'); ?>">
		<div class="form-text">En minute</div>
		<?= $err['msg']; ?>
	</div>
	<div class="mb-3">
		<?php $err = $ctrl->formValidate->getError('poster'); ?>
		<label for="poster" class="form-label">Affiche</label>
		<input type="file" class="form-control<?= $err['class']; ?>" id="poster" name="poster" value="">
		<div class="form-text">Merci de charger un fichier au format "jpg".</div>
		<?= $err['msg']; ?>
	</div>
	<div>
		<input type="hidden" name="id" value="<?= $ctrl->getValue('id'); ?>">
		<button type="submit" class="btn btn-success">Sauvegarder</button>
	</div>
</form>

<?php get_footer('admin'); ?>
