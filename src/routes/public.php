<?php
// Users
$router->map('GET|POST', '/login', 'users/login', 'login');
$router->map('GET', '/logout', 'users/logout', 'logout');
$router->map('GET', '/', 'movies/index', 'home');
