<?php
logout($router);

function logout(AltoRouter $router)
{
	session_destroy();

	header('Location: ' . $router->generate('home'));
	die;
}
