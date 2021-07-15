<?php

function alert(string $message, string $type = 'danger')
{
	$_SESSION['alert'] = [
		'message' => $message,
		'type'    => $type
	];
}


function alertDisplay()
{
	if (!empty($_SESSION['alert'])) {
		$content = '<div class="alert alert-' . $_SESSION['alert']['type'] . ' alert-dismissible fade show" role="alert">';
			$content .= $_SESSION['alert']['message'];
			$content .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
		$content .= '</div>';

		unset($_SESSION['alert']);
		
		return $content;
	}
}


function checkField(string $fieldName, string $message): array
{
	$error = ['message' => '', 'class' => ''];

	if (isset($_POST[$fieldName]) && empty($_POST[$fieldName])) {
		$error = [
			'message' => '<span class="invalid-feedback">' . $message . '</span>',
			'class'   => ' is-invalid'
		];
	}

	return $error;
}


function valueField(string $fieldName)
{
	if (!empty($_POST[$fieldName])) :
		return $_POST[$fieldName];
	endif;
}
