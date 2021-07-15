<?php get_header('Éditer un utilisateur', 'admin'); ?>

<div class="row mb-5 align-items-center">
	<h1 class="col-9">Éditer un utilisateur</h1>
</div>

<form action="" method="post" enctype="multipart/form-data">
	<div class="mb-3">
		<?php $err = $ctrl->formValidate->getError('email'); ?>
		<label for="title" class="form-label">E-mail*</label>
		<input type="text" class="form-control<?= $err['class']; ?>" id="title" name="email" value="<?= $ctrl->getValue('email'); ?>">
		<?= $err['msg']; ?>
	</div>
	<div class="mb-3">
		<?php $err = $ctrl->formValidate->getError('password'); ?>
		<label for="viewer" class="form-label">Password*</label>
		<input type="password" class="form-control<?= $err['class']; ?>" id="viewer" name="pass" value="<?= $ctrl->getValue('password'); ?>">
		<?= $err['msg']; ?>
	</div>
	<div>
		<input type="hidden" name="id" value="<?= $ctrl->getValue('id'); ?>">
		<button type="submit" class="btn btn-success">Sauvegarder</button>
	</div>
</form>

<?php get_footer('admin'); ?>
