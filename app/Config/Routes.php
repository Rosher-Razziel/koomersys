<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// ============================================
// 1. RUTAS DE AUTENTICACIÓN
// ============================================
$routes->group('', function($routes) {
    $routes->get('/', 'Auth\LoginController::index', ['filter' => 'authredirect']);
    $routes->post('/auth/login', 'Auth\LoginController::login');
    $routes->get('/auth/logout', 'Auth\LoginController::logout');
    $routes->get('/accesodenegado', 'Auth\LoginController::accesodenegado');
});

// ============================================
// 2. RUTAS PROTEGIDAS POR LOGIN
// ============================================
$routes->group('', ['filter' => 'auth'], function($routes) {

    // ----------------------------------------
    // DASHBOARD (solo roles 1, 2 y 3)
    // ----------------------------------------
    $routes->group('dashboard', ['filter' => 'role:1,2,3'], function($routes) {
        $routes->get('/', 'Dashboard\DashboardController::index');
    });

    // ----------------------------------------
    // PRODUCTOS (ejemplo: rol 1 = Admin, rol 2 = Gerente)
    // ----------------------------------------
    $routes->group('products', ['filter' => 'role:1,2'], function($routes) {
        $routes->get('/', 'Products\ProductsController::index');
        $routes->get('create', 'Products\ProductsController::create');
        $routes->post('store', 'Products\ProductsController::store');
        $routes->get('edit/(:num)', 'Products\ProductsController::edit/$1');
        $routes->post('update/(:num)', 'Products\ProductsController::update/$1');
        $routes->get('delete/(:num)', 'Products\ProductsController::delete/$1');
    });

    // ----------------------------------------
    // PUNTO DE VENTA (rol 3 = Cajero, rol 2 = Gerente)
    // ----------------------------------------
    $routes->group('pointofsale', ['filter' => 'role:2,3'], function($routes) {
        $routes->get('/', 'Pointofsale\PointofsaleController::index');
    });

    // ----------------------------------------
    // USUARIOS (solo rol 1 = Administrador)
    // ----------------------------------------
    $routes->group('usuarios', ['filter' => 'role:1'], function($routes) {
        $routes->get('/', 'Usuarios\UsuariosController::index');
        $routes->get('create', 'Usuarios\UsuariosController::create');
        $routes->post('store', 'Usuarios\UsuariosController::store');
        $routes->get('edit/(:num)', 'Usuarios\UsuariosController::edit/$1');
        $routes->post('update/(:num)', 'Usuarios\UsuariosController::update/$1');
        $routes->get('delete/(:num)', 'Usuarios\UsuariosController::delete/$1');
    });
});

$routes->set404Override(function() {
    echo view('errors/error_404');
});