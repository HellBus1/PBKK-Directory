<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
// $routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/search', 'Home::search');

$routes->get('/admin', 'AdminController::index', ['filter' => 'authfilter']);
$routes->post('/admin/login', 'AuthAdminController::login');
$routes->get('/admin/logout', 'AuthAdminController::logout');

$routes->get('/admin/category', 'AdminController::categories', ['filter' => 'authfilter']);
$routes->get('/admin/product', 'AdminController::products', ['filter' => 'authfilter']);
$routes->post('/admin/product/create', 'AdminController::createProduct', ['filter' => 'authfilter']);
$routes->post('/admin/product/edit/(:any)', 'AdminController::editProduct/$1', ['filter' => 'authfilter']);
$routes->get('/admin/product/delete/(:any)', 'AdminController::deleteProduct/$1', ['filter' => 'authfilter']);

$routes->get('/admin/order', 'AdminController::orders', ['filter' => 'authfilter']);


// $routes->get('/dashboard', 'AdminController::index', ['filter' => 'authfilter']);

$routes->get('/login', 'AuthUserController::index');
$routes->post('/login', 'AuthUserController::login');
$routes->get('/logout', 'AuthUserController::logout');

$routes->get('/cart', 'UserController::cart', ['filter' => 'userfilter']);
$routes->post('/cart/add', 'UserController::addItem', ['filter' => 'userfilter']);
$routes->get('/cart/delete/(:any)', 'UserController::deleteItem/$1', ['filter' => 'userfilter']);

$routes->post('/checkout', 'UserController::processCheckout', ['filter' => 'userfilter']);
$routes->get('/transactions', 'UserController::transactionList', ['filter' => 'userfilter']);
$routes->get('/transactions/(:any)', 'UserController::transaction/$1', ['filter' => 'userfilter']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
