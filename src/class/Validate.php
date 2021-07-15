<?php
namespace App;

class Validate {

	/**
	 * Check empty data
	 * 
	 * @param $data
	 * @param string $message
	 */
	public function checkEmpty($data, string $message = 'Ce champ est obligatoire.')
	{
		if (empty($data)) {
			return $message;
		}
	}
	

	/**
	 * Check email format
	 * 
	 * @param string $email
	 */
	public function checkEmail(string $email)
	{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return 'Merci de renseigner une adresse email valide.';
		}
	}


	/**
	 * Check date format
	 * 
	 * @param string $date
	 */
	public function checkDateFormat(string $date)
	{
		if (!preg_match("/^([0-9]{4}[-]?((0[13-9]|1[012])[-]?(0[1-9]|[12][0-9]|30)|(0[13578]|1[02])[-]?31|02[-]?(0[1-9]|1[0-9]|2[0-8]))|([0-9]{2}(([2468][048]|[02468][48])|[13579][26])|([13579][26]|[02468][048]|0[0-9]|1[0-6])00)[-]?02[-]?29)$/", $date)) {
			return 'Merci de renseigner une date au bon format. Exemple : 2020-02-25';
		}
	}


	/**
	 * Check password format
	 * 
	 * @param string $password
	 */
	public function checkPassword(string $password)
	{
		if (!preg_match('/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,50})/', $password)) {
			return 'Votre mot de passe doit contenir au minimum 8 charactères, une majuscule, une miniscule, un charactère spécial et un chiffre.';
		}
	}


	/**
	 * Check two values are equal
	 * 
	 * @param $value1
	 * @param $value2
	 */
	public function checkSameValue($value1, $value2)
	{
		if ($value1 !== $value2) {
			return 'Les informations ne sont pas identiques.';
		}
	}


	/**
	 * Check number is int and positive
	 * 
	 * @param $number
	 */
	public function checkInt($number)
	{
		if (!filter_var($number, FILTER_VALIDATE_INT) || $number < 0) :
			return 'Merci de renseigner un nombre entier et supérieur à zéro.';
		endif;
	}


	public function checkFileSize(string $fieldName, int $maxSize)
	{
		if ($_FILES[$fieldName]['size'] > $maxSize) {
			$convert = formatBytes($maxSize);
			return 'Merci de charger un fichier ne dépassant pas cette taille : ' . $convert;
		}
	}


	public function checkFileFormat(string $fieldName, array $format)
	{
		$currentExt = pathinfo($_FILES[$fieldName]['name'], PATHINFO_EXTENSION);
		$currentExt = strtolower($currentExt);
		if (!in_array($currentExt, $format)) {
			$exts = implode(', ', $format);
			return 'Merci de charger un fichier avec l\'une de ces extensions : ' . $exts . '.';
		}
	}
}
