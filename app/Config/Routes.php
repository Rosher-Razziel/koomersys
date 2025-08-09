<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth\LoginController::index');

$routes->get('/dashboard', 'Dashboard\DashboardController::index');

$routes->get('/products', 'Products\ProductsController::index');

$routes->get('/point-of-sale', 'Pointofsale\PointofsaleController::index');
