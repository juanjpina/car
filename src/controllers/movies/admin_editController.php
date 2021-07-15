<?php
namespace App\Movies;

use FormValidate;
use Cocur\Slugify\Slugify;
use \Gumlet\ImageResize;

class AdminEditController {

	public $formValidate;
	public $data;
	private $formError;

	private $requireFields = [
		'title' => [
			'message' => 'Le titre est obligatoire.',
			'rules'   => ['checkEmpty']
		],
		'released' => [
			'rules' => ['checkEmpty', 'checkDateFormat']
		],
		'viewer' => [
			'message' => 'Le nombre de spectateur est obligatoire.',
			'rules'   => ['checkEmpty', 'checkInt']
		],
		'runtime' => [
			'rules' => ['checkInt']
		],
		'poster' => [
			'type' 	  => 'file',
			'format'  => ['jpg', 'png'],
			'maxSize' => 2097152,
			'path'	  => 'files/movies',
			'resize'  => [310, 420]
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
				$sql = 'SELECT id, title, viewer, released, runtime FROM movies WHERE id = :id';
				$request = $this->db->prepare($sql);
				$request->execute(['id' => $id]);
				$this->data = $request->fetch();
			}

			if (empty($this->data)) {
				header('Location: ' . $this->router->generate('indexMovie'));
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
				'title' 	=> htmlentities($_POST['title']),
				'released'  => $_POST['released'],
				'viewer' 	=> $_POST['viewer'],
				'runtime' 	=> (!empty($_POST['runtime'])) ? $_POST['runtime'] : 0
			];

			$filePoster = $this->saveFile('poster', $_POST['title']);
			$updatePoster = '';
			$insertFieldPoster = '';
			$insertValuePoster = '';
			if ($filePoster) {
				$data['poster'] = $filePoster;
				$updatePoster = 'poster=:poster,';
				$insertFieldPoster = ', poster';
				$insertValuePoster = ', :poster';
			}

			if (!empty($_POST['id'])) {
				$sql = 'UPDATE movies SET title=:title, ' . $updatePoster .' released=:released, viewer=:viewer, runtime=:runtime WHERE id=:id';
				$data['id'] = $_POST['id'];
			}
			else {
				$sql = 'INSERT INTO movies (title, released, viewer, runtime' . $insertFieldPoster . ') VALUES (:title, :released, :viewer, :runtime' . $insertValuePoster . ')';
			}

			$request = $this->db->prepare($sql);
			if ($request->execute($data)) {
				$idRedirect = (empty($_POST['id'])) ? $this->db->lastInsertId() : $_POST['id'];

				alert('Le film a bien été sauvegardé.', 'success');
				header('Location: ' . $this->router->generate('updateMovie', ['id' => $idRedirect]));
				die;
			}
			else {
				alert('Erreur lors de la sauvegarde du film.', 'danger');
				header('Location: ' . $this->router->generate('indexMovie'));
				die;
			}
		}
	}


	private function saveFile(string $fieldname, string $title = '')
	{
		if (!empty($_FILES[$fieldname]['name'])) {
			$file = $_FILES[$fieldname];

			$path = 'src/' . $this->requireFields[$fieldname]['path'];
			
			if (!is_dir($path) && !mkdir($path, 0755, true)) {
				alert('Erreur: merci de contacter le dev.', 'error');
				header('Location: ' . $this->router->generate('indexMovie'));
				die;
			}

			$slugify = new Slugify();
			$ext = pathinfo(basename($file['name']), PATHINFO_EXTENSION);
			
			if (!$title) {
				$filename = pathinfo(basename($file['name']), PATHINFO_FILENAME);
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
	}
}

$ctrl = new AdminEditController($db, $router);
