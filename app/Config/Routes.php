<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
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
$routes->set404Override(function ()
{
    echo view('site/error404');
});
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/world/(:any)', 'World::index/$1');
$routes->get('/article/pdf/(:any)/(:any)', 'Article::buildPdf/$1/$2');
$routes->get('/article/(:any)/(:any)', 'Article::index/$1/$2');
$routes->get('/category/(:any)', 'Category::index/$1');
$routes->get('/school', 'School::index');
$routes->get('/build', 'Build::index');
$routes->get('/build/category/(:any)', 'Build::index/$1');
$routes->get('/build/create', 'Build::create');
$routes->get('/build/edit/(:any)/(:any)', 'Build::edit/$1/$2');
$routes->get('/build/delete/(:any)/(:any)', 'Build::deleteArticle/$1/$2');
$routes->post('/build/update', 'Build::update');
$routes->post('/build/add', 'Build::add');
$routes->get('/build/delete', 'Build::delete');
$routes->post('/build/delArticle', 'Build::del');
$routes->get('/build/editCategory', 'Build::editCategory');
$routes->post('/build/updateCategory', 'Build::updateCategory');

$routes->get('/buildSchool', 'Build::buildSchool');
$routes->post('/buildSchool/add', 'Build::addSchool');
$routes->get('/buildSchool/delete/(:any)', 'Build::deleteSchool/$1');


$routes->post('/search', 'Search::index');
$routes->get('/search/(:any)', 'Search::cloud/$1');

$routes->get('/quiz/restart', 'Quiz::restart');
$routes->get('/quiz/(:any)', 'Quiz::index/$1');
$routes->post('/quiz/sendQuestion', 'Quiz::sendQuestion');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
