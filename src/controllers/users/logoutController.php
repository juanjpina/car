<?php
logout($router);

function logout(AltoRouter $router)
{
	unset($_SESSION['auth']);
	header('Location: ' . $router->generate('login'));
	die;
}
