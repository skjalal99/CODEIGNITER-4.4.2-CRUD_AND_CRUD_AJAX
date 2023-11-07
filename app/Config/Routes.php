<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/crud', 'crudcontroller::index');
$routes->get('/add', 'crudcontroller::add');
$routes->post('/create', 'crudcontroller::create');
$routes->post('/update/(:num)', 'crudcontroller::edit/$1');
$routes->add('editsingle/(:num)', 'crudcontroller::singleUserview/$1');

$routes->add('delete/(:num)', 'crudcontroller::delete/$1');
