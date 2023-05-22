<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
//$routes->setAutoRoute(true);

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');

$routes->resource('utilisateur',['controller' => 'UtilisateurController']);
/* $routes->get('utilisateur', 'UtilisateurController::index');
$routes->post('utilisateur', 'UtilisateurController::create');
$routes->put('utilisateur/(:num)', 'UtilisateurController::update/$1');
$routes->delete('utilisateur/(:num)', 'UtilisateurController::delete/$1');
$routes->get('utilisateur/(:num)', 'UtilisateurController::show/$1');
 */
$routes->post('utilisateur/login', 'UtilisateurController::login');
$routes->post('utilisateur/login1', 'UtilisateurController::login1');

$routes->post('user', 'UtilisateurController::ajout');
$routes->get('user', 'UtilisateurController::ajoutuser');
$routes->get('usersup/(:any)/(:any)', 'UtilisateurController::supprimer/$1/$2');
$routes->get('user/modif', 'UtilisateurController::adduser');

$routes->get('facture', 'UtilisateurController::print');//Dowmload
$routes->get('users', 'UtilisateurController::listeuser');//Dowmload

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
