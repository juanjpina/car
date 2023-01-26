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

/**
 * On vérifie si en champ du formoulaire est vide. 
 * @param String
 * @return Array. 
 */
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

/**
 * checks if passwords are the same
 * @param string
 * @return array
 */
function egalPass(string $pass, string $cpass): array
{
	$resul = ['message' => ''];
	if (!empty($_POST['password']) && !empty($_POST['confirmerPassword'])) {
		$pass = $_POST['password'];
		$cpass = $_POST['confirmerPassword'];
		if (!empty($pass) && !empty($cpass)) {
			if (strcmp($pass, $cpass) !== 0) {
				// dump(strcmp($pass, $cpass));
				$resul = [
					'message' => 'Les mots de pass sont different'
				];
			}
		}
	}
	return $resul;
}


/**
 * @param String
 *check if the email has the correct format 
 * @return array
 */
function checkEmail(string $email): array
{
	$resul = ['message' => ''];
	if (!empty($_POST[$email]) && isset($_POST[$email])) {
		if (!filter_var($_POST[$email], FILTER_VALIDATE_EMAIL)) {

			$resul = ['message' => "Format de l'email incorrect."];
		}
	}
	return $resul;
}



function valueField(string $fieldName)
{
	if (!empty($_POST[$fieldName])) :
		return $_POST[$fieldName];
	endif;
}
