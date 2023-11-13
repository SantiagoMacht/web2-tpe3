<?php

require_once './database/config.php';
require_once 'libs/router.php';
require_once './app/controllers/productApiController.php';
require_once './app/controllers/categoryApiController.php';

$router = new Router();


//Definir rutas



$router->addRoute('productos', 'GET', 'ProductApiController', 'showProducts');
$router->addRoute('productos/:ID', 'GET', 'ProductApiController', 'showProducts');
$router->addRoute('productos/:sort/:order', 'GET', 'ProductApiController', 'showProducts');
$router->addRoute('productos', 'POST', 'ProductApiController', 'agregarProd');
$router->addRoute('productos/:ID', 'DELETE', 'ProductApiController', 'borrarProd');
$router->addRoute('productos/:ID', 'PUT', 'ProductApiController', 'updateProd');
$router->addRoute('categorias', 'GET', 'CategoryApiController', 'showCategorys');
$router->addRoute('categorias/:ID', 'GET', 'CategoryApiController', 'showCategorys');
$router->addRoute('categorias', 'POST', 'CategoryApiController', 'agregarCategory');
$router->addRoute('categorias/:ID', 'DELETE', 'CategoryApiController', 'borrarCategory');
$router->addRoute('categorias/:ID', 'PUT', 'CategoryApiController', 'updateCategory');


$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);