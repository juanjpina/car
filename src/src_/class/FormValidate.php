<?php

use App\Validate;

class FormValidate
{

	private $requireFields = [];

	private $errorTemplateMessage = 'invalid-feedback';
	private $errorTemplateClass = ' is-invalid';
	private $errorTemplateMessageTag = 'span';

	public $existError = false;


	/**
	 * Complet requireFields
	 * 
	 * @param array $fields
	 */
	public function __construct(array $fields)
	{
		$this->requireFields = $fields;
	}


	/**
	 * Apply rule validate in fields required
	 */
	public function checkValidate()
	{
		if (!empty($_POST)) {
			$validate = new Validate();
			$messagesError = [];

			foreach ($this->requireFields as $key => $field) {
				if (!empty($field['type']) && $field['type'] === 'file') {
					// $fileMessage = $this->checkFileValidate($field, $key);
					// if ($fileMessage) {
					// 	$messagesError[$key] = $fileMessage;
					// }
				} else if (!empty($field['rules'])) {
					if (
						in_array('checkEmpty', $field['rules']) && empty($_POST[$key]) ||
						!empty($_POST[$key])
					) {
						foreach ($field['rules'] as $rule) {
							if ($rule === 'checkEmpty' && !empty($field['message'])) {
								dump($field['message']);
								$messagesError[$key] = $validate->$rule($_POST[$key], $field['message']);
							} else {
								$messagesError[$key] = $validate->$rule($_POST[$key]);
							}

							if ($messagesError[$key]) {
								break;
							} else {
								unset($messagesError[$key]);
							}
						}
					}
				}
			}

			$this->messagesError = $messagesError;

			// Check at least error into field
			if ($messagesError) {
				$this->existError = true;
				return true;
			} else {
				return false;
			}
		}
	}


	// private function checkFileValidate($rules, $fieldName)
	// {
	// 	if (!empty($_FILES[$fieldName]['name'])) {
	// 		$validate = new Validate();
	// 		$result = '';

	// 		if ($_FILES[$fieldName]['error'] === UPLOAD_ERR_OK) {
	// 			// Check format file
	// 			if (!empty($rules['format'])) {
	// 				$result .= $validate->checkFileFormat($fieldName, $rules['format']);
	// 			}

	// 			if (!empty($rules['maxSize'])) {
	// 				$result .= $validate->checkFileSize($fieldName, $rules['maxSize']);
	// 			}
	// 		}
	// 		else {
	// 			$result = 'Fichier invalide.';
	// 		}

	// 		return $result;
	// 	}
	// }


	/**
	 * Display error field
	 * 
	 * @param string $field name input
	 */
	public function getError(string $field): array
	{
		$results = ['class' => '', 'msg'  => ''];

		if (!empty($_POST) && !empty($this->messagesError[$field])) {
			$results = [
				'class' => $this->errorTemplateClass,
				'msg' => $this->errorTemplate($this->messagesError[$field])
			];
		}

		return $results;
	}


	/**
	 * Create tag html to display error message
	 */
	private function errorTemplate(string $text): string
	{
		$content = '<' . $this->errorTemplateMessageTag;
		$content .= ' class="' . $this->errorTemplateMessage . '">';
		$content .= $text;
		$content .= '</' . $this->errorTemplateMessageTag . '>';

		return $content;
	}
}
