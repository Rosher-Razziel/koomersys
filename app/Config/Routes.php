<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth\LoginController::index', ['filter' => 'guest']);
$routes->post('/auth/login', 'Auth\LoginController::login');
$routes->get('/auth/logout', 'Auth\LoginController::logout');
//----------------------------------------------------------------------------------------------------------
$routes->get('/dashboard', 'Dashboard\DashboardController::index', ['filter' => 'auth']);
$routes->get('/products', 'Products\ProductsController::index', ['filter' => 'auth']);
$routes->get('/point-of-sale', 'Pointofsale\PointofsaleController::index', ['filter' => 'auth']);
//----------------------------------------------------------------------------------------------------------
// $routes->post('/auth/login', 'Auth::login');
// $routes->get('/auth/logout', 'Auth::logout');
// $routes->group('', ['filter' => 'auth'], function($routes) {
//     $routes->get('/dashboard', 'Dashboard::index');
// });
// $routes->group('admin', ['filter' => 'role:1'], function($routes) {
//     $routes->get('usuarios', 'UsuarioController::index');
// });