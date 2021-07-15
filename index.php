<?php
// Load composer package
require 'vendor/autoload.php';

session_start();

// Load custom files
require 'src/config/config.php';
require 'src/config/database.php';
require 'src/tools/functions.php';
require 'src/tools/form.php';
require 'src/class/Autoloader.php';

// Load class
use App\Autoloader;
Autoloader::register();

// Load AltoRouter
$router = new AltoRouter();
$router->setBasePath(BASEPATH);

// Load routes
require 'src/routes/admin.php';
require 'src/routes/public.php';

// Execute routes
$match = $router->match();

// Display content
if ($match) :
	checkAdmin($router, $match['target']);
	if (!empty($match['params'])) {
		$_GET = array_merge($_GET, $match['params']);
	}
	require 'src/controllers/' . $match['target'] . 'Controller.php'; // Load Controller
	require 'src/views/' . $match['target'] . 'View.php'; // Load View
else :
	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
	require 'src/404.php';
endif;
