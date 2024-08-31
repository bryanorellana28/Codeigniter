<?php

namespace Config;

use App\Controllers\RouterController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

$routes->get('/', 'RouterController::index');
$routes->get('routers', 'RouterController::index');
$routes->get('routers/create', 'RouterController::create');
$routes->post('routers/store', 'RouterController::store');
$routes->get('routers/edit/(:segment)', 'RouterController::edit/$1');
$routes->post('routers/update/(:segment)', 'RouterController::update/$1');
$routes->get('routers/delete/(:segment)', 'RouterController::delete/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. One
 * example is the environment-based routes file.
 *
 * require_once ENVIRONMENT . 'Config/Routes.php';
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
