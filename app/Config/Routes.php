<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Front::index', ['filter' => 'front']);
$routes->get('/auth', 'Auth::index', ['filter' => 'logout']);
$routes->get('/home', 'Home::index');

$routes->get('/user', 'User::index');
$routes->get('/user/create', 'User::create');
$routes->get('/user/edit', 'User::edit');

$routes->get('/supplier', 'Supplier::index');
$routes->get('/supplier/create', 'Supplier::create');
$routes->get('/supplier/edit', 'Supplier::edit');



// FILTER CARA AWAL / LAMA

// $routes->get('/supplier', 'Supplier::index', ['filter' => 'suply']);
// $routes->get('/supplier/create', 'Supplier::create', ['filter' => 'suply']);
// $routes->get('/supplier/edit', 'Supplier::edit', ['filter' => 'suply']);


$routes->setAutoRoute(true);
