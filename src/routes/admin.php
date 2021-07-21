<?php
// Home
$router->map('GET|POST', '/admin', 'pages/admin_index', 'admin');

// Movies
//$router->map('GET|POST', '/admin/movies/add', 'movies/admin_add', 'addMovie');
$router->map('GET', '/admin/movies', 'movies/admin_index', 'indexMovie');
$router->map('GET', '/admin/movies/delete/[i:id]', 'movies/admin_delete', 'deleteMovie');
$router->map('GET|POST', '/admin/movies/edit/[i:id]', 'movies/admin_edit', 'updateMovie');
$router->map('GET|POST', '/admin/movies/edit', 'movies/admin_edit', 'addMovie');

$router->map('GET', '/admin/categories/', 'categories/admin_index', 'indexCategories');
$router->map('GET', '/admin/categories/delete/[i:id]', 'categories/admin_delete', 'deleteCategories');
$router->map('GET|POST', '/admin/categories/edit/[i:id]', 'categories/admin_edits', 'updateCategories');
$router->map('GET|POST', '/admin/categories/edit', 'categories/admin_edits', 'addCategories');

$router->map('GET', '/admin/users/', 'users/admin_indexUser', 'indexUsers');
$router->map('GET', '/admin/users/delete/[i:id]', 'users/admin_deleteUser', 'deleteUsers');
$router->map('GET|POST', '/admin/users/edit/[i:id]', 'users/admin_editUser', 'updateUsers');
$router->map('GET|POST', '/admin/users/edit', 'users/admin_editUser', 'addUsers');

$router->map('GET|POST', '/admin/user/', 'user/admin_fraUser', 'addfraUser');
