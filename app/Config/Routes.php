<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// ============================================
// 1. RUTAS DE AUTENTICACIÓN
// ============================================
$routes->group('', function ($routes) {
    $routes->get('/', 'Auth\LoginController::index', ['filter' => 'authredirect']);
    $routes->post('/auth/login', 'Auth\LoginController::login');
    $routes->get('/auth/logout', 'Auth\LoginController::logout');
    $routes->get('/accesodenegado', 'Auth\LoginController::accesodenegado');
    $routes->get('/ping', 'Usuarios\UsuariosController::ping');
});

// ============================================
// 2. RUTAS PROTEGIDAS POR LOGIN
// ============================================
$routes->group('', ['filter' => 'auth'], function ($routes) {
    // ----------------------------------------
    // DASHBOARD
    // ----------------------------------------
    $routes->get('dashboard', 'Dashboard\DashboardController::index', ['filter' => 'role:1,2,3']);

    // ----------------------------------------
    // PUNTO DE VENTA
    // ----------------------------------------
    $routes->group('punto-venta', ['filter' => 'role:1,2,3'], function ($routes) {
        $routes->get('/', 'Ventas\PuntoVentaController::index');
        $routes->post('guardar', 'Ventas\PuntoVentaController::guardarVenta');
    });

    // ----------------------------------------
    // HISTORIAL DE VENTAS
    // ----------------------------------------
    $routes->group('ventas', ['filter' => 'role:1,2,3'], function ($routes) {
        $routes->get('/', 'Ventas\HistorialController::index');
        $routes->get('detalle/(:num)', 'Ventas\HistorialController::detalle/$1');
    });

    // ----------------------------------------
    // ALMACÉN
    // ----------------------------------------
    $routes->group('almacen', ['filter' => 'role:1,2,3'], function ($routes) {
        $routes->get('/', 'Almacen\AlmacenController::index');
    });

    // ----------------------------------------
    // PRODUCTOS (CRUD)
    // ----------------------------------------
    $routes->group('productos', ['filter' => 'role:1,2,3'], function ($routes) {
        $routes->get('/', 'Productos\ProductosController::index');
        $routes->get('create', 'Productos\ProductosController::create');
        $routes->post('store', 'Productos\ProductosController::store');
        $routes->get('edit/(:num)', 'Productos\ProductosController::edit/$1');
        $routes->post('update/(:num)', 'Productos\ProductosController::update/$1');
        $routes->get('delete/(:num)', 'Productos\ProductosController::delete/$1');
    });

    // ----------------------------------------
    // CATEGORÍAS (CRUD)
    // ----------------------------------------
    $routes->group('categorias', ['filter' => 'role:1,2,3'], function ($routes) {
        $routes->get('/', 'Categorias\CategoriasController::index');
        $routes->get('create', 'Categorias\CategoriasController::create');
        $routes->post('store', 'Categorias\CategoriasController::store');
        $routes->get('edit/(:num)', 'Categorias\CategoriasController::edit/$1');
        $routes->post('update/(:num)', 'Categorias\CategoriasController::update/$1');
        $routes->get('delete/(:num)', 'Categorias\CategoriasController::delete/$1');
    });

    // ----------------------------------------
    // PROVEEDORES (CRUD)
    // ----------------------------------------
    $routes->group('proveedores', ['filter' => 'role:1,2,3'], function ($routes) {
        $routes->get('/', 'Proveedores\ProveedoresController::index');
        $routes->get('create', 'Proveedores\ProveedoresController::create');
        $routes->post('store', 'Proveedores\ProveedoresController::store');
        $routes->get('edit/(:num)', 'Proveedores\ProveedoresController::edit/$1');
        $routes->post('update/(:num)', 'Proveedores\ProveedoresController::update/$1');
        $routes->get('delete/(:num)', 'Proveedores\ProveedoresController::delete/$1');
    });

    // ----------------------------------------
    // COMPRAS
    // ----------------------------------------
    $routes->group('compras', ['filter' => 'role:1,2,3'], function ($routes) {
        $routes->get('/', 'Compras\ComprasController::index');
        $routes->get('create', 'Compras\ComprasController::create');
        $routes->post('store', 'Compras\ComprasController::store');
        $routes->get('detalle/(:num)', 'Compras\ComprasController::detalle/$1');
    });

    // ----------------------------------------
    // ENTRADAS
    // ----------------------------------------
    $routes->group('entradas', ['filter' => 'role:1,2,3'], function ($routes) {
        $routes->get('/', 'Entradas\EntradasController::index');
        $routes->get('create', 'Entradas\EntradasController::create');
        $routes->post('store', 'Entradas\EntradasController::store');
    });

    // ----------------------------------------
    // ADMINISTRACIÓN
    // ----------------------------------------
    $routes->group('admin', ['filter' => 'role:1,2,3'], function ($routes) {
        $routes->get('/', 'Admin\AdminController::index');
    });

    // ----------------------------------------
    // USUARIOS (CRUD, solo admin rol 1)
    // ----------------------------------------
    $routes->group('usuarios', ['filter' => 'role:1,2,3'], function ($routes) {
        $routes->get('/', 'Usuarios\UsuariosController::index');
        $routes->get('agregar', 'Usuarios\UsuariosController::agregar');
        $routes->get('edit/(:any/:any)', 'Usuarios\UsuariosController::edit/$1/$2');
        $routes->get('create', 'Usuarios\UsuariosController::create');
        $routes->post('update/(:num)', 'Usuarios\UsuariosController::update/$1');
        $routes->get('delete/(:num)', 'Usuarios\UsuariosController::delete/$1');
    });

    // ----------------------------------------
    // CLIENTES (CRUD)
    // ----------------------------------------
    $routes->group('clientes', ['filter' => 'role:1,2,3'], function ($routes) {
        $routes->get('/', 'Clientes\ClientesController::index');
        $routes->get('create', 'Clientes\ClientesController::create');
        $routes->post('store', 'Clientes\ClientesController::store');
        $routes->get('edit/(:num)', 'Clientes\ClientesController::edit/$1');
        $routes->post('update/(:num)', 'Clientes\ClientesController::update/$1');
        $routes->get('delete/(:num)', 'Clientes\ClientesController::delete/$1');
    });

    // ----------------------------------------
    // CAJAS (CRUD sencillo)
    // ----------------------------------------
    $routes->group('cajas', ['filter' => 'role:1,2,3'], function ($routes) {
        $routes->get('/', 'Cajas\CajasController::index');
        $routes->get('create', 'Cajas\CajasController::create');
        $routes->post('store', 'Cajas\CajasController::store');
        $routes->get('delete/(:num)', 'Cajas\CajasController::delete/$1');
    });

    // ----------------------------------------
    // MEDIDAS (CRUD sencillo)
    // ----------------------------------------
    $routes->group('medidas', ['filter' => 'role:1,2,3'], function ($routes) {
        $routes->get('/', 'Medidas\MedidasController::index');
        $routes->get('create', 'Medidas\MedidasController::create');
        $routes->post('store', 'Medidas\MedidasController::store');
        $routes->get('delete/(:num)', 'Medidas\MedidasController::delete/$1');
    });

    // ----------------------------------------
    // ROLES (CRUD solo admin)
    // ----------------------------------------
    $routes->group('roles', ['filter' => 'role:1,2,3'], ['filter' => 'role:1'], function ($routes) {
        $routes->get('/', 'Roles\RolesController::index');
        $routes->get('create', 'Roles\RolesController::create');
        $routes->post('store', 'Roles\RolesController::store');
        $routes->get('edit/(:num)', 'Roles\RolesController::edit/$1');
        $routes->post('update/(:num)', 'Roles\RolesController::update/$1');
        $routes->get('delete/(:num)', 'Roles\RolesController::delete/$1');
    });

    // ----------------------------------------
    // REPORTES
    // ----------------------------------------
    $routes->group('reportes', ['filter' => 'role:1,2,3'], function ($routes) {
        $routes->get('/', 'Reportes\ReportesController::index');
        $routes->post('generar', 'Reportes\ReportesController::generar');
    });

    // ----------------------------------------
    // CONFIGURACIÓN GENERAL
    // ----------------------------------------
    $routes->group('configuracion', ['filter' => 'role:1'], function ($routes) {
        $routes->get('/', 'Config\ConfigController::index');
        $routes->post('guardar', 'Config\ConfigController::guardar');
    });
});

$routes->set404Override(function () {
    echo view('errors/error_404');
});
