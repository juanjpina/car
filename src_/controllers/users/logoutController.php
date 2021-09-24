<?php
logout($router);

function logout(AltoRouter $router)
{
	session_destroy();
	// unset($_SESSION['auth']);
	header('Location: ' . $router->generate('home'));
	die;
}
