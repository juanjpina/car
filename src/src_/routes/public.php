<?php
// Users
$router->map('GET|POST', '/login', 'users/login', 'login');
$router->map('GET|POST', '/newlogin', 'users/newLogin', 'newlogin');
$router->map('GET', '/logout', 'users/logout', 'logout');
$router->map('GET', '/', 'users/index', 'home');
$router->map('GET|POST', '/pswforget', 'users/pswForget', 'pswforget');
$router->map('GET', '/mention', 'users/mention', 'mention');
$router->map('GET|POST', '/send', 'users/send', 'send');
$router->map('GET|POST', '/inputnull', 'users/inputNull', 'inputnull');
