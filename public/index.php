<?php
require_once __DIR__ . '/../includes/app.php';
use Controllers\LoginController;
use MVC\Router;
use Controllers\ProductoControllers;
use Controllers\PaginasController;
$router = new Router();
//administrador

$router->get('/admin',[ProductoControllers::class, 'index']);
$router->get('/productos/crear',[ProductoControllers::class, 'crear']);
$router->post('/productos/crear',[ProductoControllers::class, 'crear']);
$router->get('/productos/actualizar',[ProductoControllers::class, 'actualizar']);
$router->post('/productos/actualizar',[ProductoControllers::class, 'actualizar']);
$router->post('/productos/eliminar',[ProductoControllers::class, 'eliminar']);
//Usuarios
$router->get('/', [PaginasController::class, 'index']);
$router->get('/productos', [PaginasController::class, 'productos']);
$router->post('/productos', [PaginasController::class, 'productos']);
$router->get('/describeProducto', [PaginasController::class, 'describeProducto']);
//login y Autenticacion
$router->get('/login', [LoginController::class,'login']);
$router->post('/login', [LoginController::class,'login']);
$router->get('/logout', [LoginController::class,'logout']);


$router->comprobarRutas();