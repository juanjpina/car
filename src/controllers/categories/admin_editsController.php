<?php
namespace App\Categories;

use FormValidate;
use Cocur\Slugify\Slugify;
use \Gumlet\ImageResize;

class Admin_editsController {

	public $formValidate;
	public $data;
	private $formError;

	private $requireFields = [
		'categorie' => [
			'message' => 'La catégorie est obligatoire.',
			'rules'   => ['checkEmpty'],
		]
	];


	public function __construct(\PDO $db, \AltoRouter $router)
	{
		$this->db = $db;
		$this->router = $router;

		$this->checkId();

		$this->formValidate = new FormValidate($this->requireFields);
		$this->formError = $this->formValidate->checkValidate();

		$this->saveMovie();
	}


	public function checkId()
	{
		if (!empty($_GET['id'])) {
			$id = $_GET['id'];
	
			if (filter_var($id, FILTER_VALIDATE_INT) && $id > 0) {
				$sql = 'SELECT id, categorie FROM categories WHERE id = :id';
				$request = $this->db->prepare($sql);
				$request->execute(['id' => $id]);
				$this->data = $request->fetch();
			}

			if (empty($this->data)) {
				header('Location: ' . $this->router->generate('indexCategorie'));
				die;
			}
		}
	}


	public function getValue(string $fieldName)
	{
		if (!empty($this->data->$fieldName)) {
			return $this->data->$fieldName;
		}
	}


	private function saveMovie()
	{
		if (!empty($_POST) && !$this->formError) {			
			$data = [
				
				'categorie'  => htmlentities($_POST['categorie'])
				
			];
	
			if (!empty($_POST['id'])) {
				$sql = 'UPDATE categories SET categorie=:categorie WHERE id=:id';
				$data['id'] = $_POST['id'];
			}
			else {
				$sql = 'INSERT INTO categories (categorie) VALUES (:categorie)';
			}

			$request = $this->db->prepare($sql);
			if ($request->execute($data)) {
				$idRedirect = (empty($_POST['id'])) ? $this->db->lastInsertId() : $_POST['id'];

				alert('Le film a bien été sauvegardé.', 'success');
				header('Location: ' . $this->router->generate('updateCategories', ['id' => $idRedirect]));
				die;
			}
			else {
				alert('Erreur lors de la sauvegarde du catégorie.', 'danger');
				header('Location: ' . $this->router->generate('indexCategories'));
				die;
			}
		}
	}


	/* private function saveFile(string $fieldname, string $title = '')
	{
		if (!empty($_FILES[$fieldname]['categorie'])) {
			$file = $_FILES[$fieldname];

			$path = 'src/' . $this->requireFields[$fieldname]['path'];
			
			if (!is_dir($path) && !mkdir($path, 0755, true)) {
				alert('Erreur: merci de contacter le dev.', 'error');
				header('Location: ' . $this->router->generate('indexCategorie'));
				die;
			}

			$slugify = new Slugify();
			$ext = pathinfo(basename($file['categorie']), PATHINFO_EXTENSION);
			
			if (!$title) {
				$filename = pathinfo(basename($file['categorie']), PATHINFO_FILENAME);
				$filename = $slugify->slugify($filename);
			}
			else {
				$filename = $slugify->slugify($title);
			}
			
			$path .= '/' . $filename . '.' . $ext;
			if (move_uploaded_file($file['tmp_name'], $path)) {
				$image = new ImageResize($path);
				$image->resizeToBestFit(
					$this->requireFields[$fieldname]['resize'][0], 
					$this->requireFields[$fieldname]['resize'][1]
				);
				$image->save($path);

				return $path;
			}
		}
	} */
}

$ctrl = new Admin_editsController($db, $router);
