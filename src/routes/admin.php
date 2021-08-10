<?php
// Home
$router->map('GET', '/admin', 'pages/admin_index', 'homeadmin');
//$router->map('GET', '/admin', 'pages/admin_addFra', 'addfra');

// Movies
//$router->map('GET|POST', '/admin/movies/add', 'movies/admin_add', 'addMovie');
//$router->map('GET', '/admin/movies', 'movies/admin_index', 'indexMovie');
//$router->map('GET', '/admin/movies/delete/[i:id]', 'movies/admin_delete', 'deleteMovie');
//$router->map('GET|POST', '/admin/movies/edit/[i:id]', 'movies/admin_edit', 'updateMovie');
//$router->map('GET|POST', '/admin/movies/edit', 'movies/admin_edit', 'addMovie');
//$router->map('GET', '/admin/categories/', 'categories/admin_index', 'indexCategories');
//$router->map('GET', '/admin/categories/delete/[i:id]', 'categories/admin_delete', 'deleteCategories');
//$router->map('GET|POST', '/admin/categories/edit/[i:id]', 'categories/admin_edits', 'updateCategories');
//$router->map('GET|POST', '/admin/categories/edit', 'categories/admin_edits', 'addCategories');

//$router->map('GET', '/admin/users/', 'users/admin_indexUser', 'indexUsers');
//$router->map('GET', '/admin/users/delete/[i:id]', 'users/admin_deleteUser', 'deleteUsers');
//$router->map('GET|POST', '/admin/users/edit/[i:id]', 'users/admin_editUser', 'updateUsers');


$router->map('GET|POST', '/admin/users/edit', 'users/admin_editUser', 'editUser');

$router->map('GET|POST', '/admin/users/addinvocecar', 'users/admin_addInvoiceCar', 'addinvoicecar');
$router->map('GET|POST', '/admin/users/editsta', 'users/admin_editStatisticsCar', 'editstacar');
$router->map('GET|POST', '/admin/users/addnewcar', 'users/admin_addCar', 'addnewcar');






$router->map('GET|POST', '/admin/invoice/invoicemenu', 'invoice/admin_addInvoiceMenu', 'addInvoiceMenu');
$router->map('GET|POST', '/admin/invoice/', 'invoice/admin_addInvoice', 'addInvoice');

$router->map('GET|POST', '/admin/statistics/', 'statistics/admin_addStatistics', 'addstatistics');
$router->map('GET|POST', '/admin/statistics/listed', 'statistics/admin_listedStatistics', 'listedstatistics');

$router->map('GET|POST', '/admin/history/', 'history/admin_addHistory', 'addhistory');
$router->map('GET|POST', '/admin/history/listed', 'history/admin_listedHistory', 'listedhistory');

$router->map('GET|POST', '/admin/alerts/', 'alerts/admin_addAlerts', 'addalerts');
$router->map('GET|POST', '/admin/alerts/edit', 'alerts/admin_editAlerts', 'editalerts');
