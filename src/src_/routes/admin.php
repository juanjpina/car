<?php
// Home
$router->map('GET|POST', '/reception', 'pages/admin_reception', 'reception');
$router->map('GET', '/white', 'pages/admin_white', 'white');
$router->map('GET', '/execution', 'pages/admin_executionOK', 'execution');
$router->map('GET', '/executionError', 'pages/admin_executionError', 'executionError');
$router->map('GET', '/whiteHome', 'pages/admin_whiteHome', 'whiteHome');
$router->map('GET', '/executionCar', 'pages/admin_executionCar', 'executionCar');
$router->map('GET', '/executionInvoice', 'pages/admin_executionInvoice', 'executionInvoice');
$router->map('GET', '/executionDelete', 'pages/admin_executionDelete', 'executionDelete');
$router->map('GET', '/executionModified', 'pages/admin_executionModified', 'executionModified');
$router->map('GET', '/executionHistory', 'pages/admin_executionHistory', 'executionHistory');
$router->map('GET', '/executionHelp', 'pages/admin_help', 'executionHelp');
$router->map('GET', '/executionPseudo', 'pages/admin_executionPseudo', 'executionPseudo');
$router->map('GET', '/executionInvoiceError', 'pages/admin_executionInvoiceError', 'invoiceError');


$router->map('GET|POST', '/admin/users/edit', 'users/admin_editUser', 'editUser');
$router->map('GET|POST', '/admin/users/addinvocecar', 'users/admin_addInvoiceCar', 'addinvoicecar');
$router->map('GET|POST', '/admin/users/editpassword', 'users/admin_editPassword', 'editpassword');
$router->map('GET|POST', '/admin/users/sendadmin', 'users/sendAdmin', 'sendAdmin');



//*************     invoice *****************/
$router->map('GET|POST', '/admin/invoice/invoiceedit', 'invoice/admin_editInvoice', 'editInvoice');
$router->map('GET|POST', '/admin/invoice/invoicemenu', 'invoice/admin_addInvoiceMenu', 'addInvoiceMenu');
$router->map('GET|POST', '/admin/invoice/', 'invoice/admin_addInvoice', 'addInvoice');
$router->map('GET|POST', '/admin/invoice/delete/[:id]/[:db]', 'invoice/admin_deleteInvoice', 'deleteInvoice');
$router->map('GET|POST', '/admin/invoice/modify/[:id]/[:db]', 'invoice/admin_modifyInvoice', 'modifyInvoice');

$router->map('GET|POST', '/admin/statistics/', 'statistics/admin_addStatistics', 'addstatistics');
$router->map('GET|POST', '/admin/statistics/listed/[:period]/[:dateStart]/[:dateEnd]/[:id]', 'statistics/admin_listedStatistics', 'listedstatistics');
$router->map('GET|POST', '/admin/statistics/menu/', 'statistics/admin_menuStatistics', 'menustatistics');
$router->map('GET|POST', '/admin/statistics/total/[:car]/[:year]', 'statistics/admin_totalStatistics', 'totalstatistics');
$router->map('GET|POST', '/admin/statistics/menutotal/', 'statistics/admin_menuTotalesStatistics', 'menutotalstatistics');
$router->map('GET|POST', '/admin/statistics/menugraphics/', 'statistics/admin_menuGraphics', 'menugraphics');
$router->map('GET|POST', '/admin/statistics/graphics/[:car]/[:startYear]/[:endYear]', 'statistics/admin_listedGraphics', 'listedgraphics');
$router->map('GET|POST', '/admin/statistics/fuel', 'statistics/admin_fuelStatistics', 'fuelstatistics');

$router->map('GET|POST', '/admin/history/', 'history/admin_addHistory', 'addhistory');
$router->map('GET|POST', '/admin/history/listed/[:invoice]/[:period]/[:dateStart]/[:dateEnd]/[:id]', 'history/admin_listedHistory', 'listedhistory');

$router->map('GET|POST', '/admin/alerts/', 'alerts/admin_addAlerts', 'addalerts');
$router->map('GET|POST', '/admin/alerts/edit', 'alerts/admin_editAlerts', 'editalerts');
$router->map('GET|POST', '/admin/alerts/mail', 'alerts/admin_mailAlerts', 'mailalerts');

$router->map('GET|POST', '/admin/setting/menu', 'setting/admin_settingMenu', 'settingmenu');
$router->map('GET|POST', '/admin/setting/addnewcar', 'setting/admin_addCar', 'addnewcar');
$router->map('GET|POST', '/admin/setting/maintenance', 'setting/admin_maintenance', 'maintenance');
$router->map('GET|POST', '/admin/setting/editsta', 'setting/admin_editStatisticsCar', 'editstacar');
$router->map('GET|POST', '/admin/setting/selectcar', 'setting/admin_selectCar', 'selectcar');
$router->map('GET|POST', '/admin/setting/fuel', 'setting/admin_fuel', 'fuel');
