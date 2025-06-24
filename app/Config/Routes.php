<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Pages');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

// Main Routes
$routes->get('/', 'Pages::index');
$routes->get('home', 'Pages::index');
$routes->get('about', 'Pages::index/about');
$routes->get('services', 'Pages::index/services');
$routes->match(['get', 'post'], 'contact', 'Pages::contact');
$routes->get('(:any)', 'Pages::index/$1');

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}