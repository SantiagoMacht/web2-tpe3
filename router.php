<?php

require_once 'libs/router.php';
require_once './app/controllers/productApiController.php';

$router = new Router();


//Definir rutas



$router->addRoute('productos', 'GET', 'ProductApiController', 'showProducts');
$router->addRoute('productos/:ID', 'GET', 'ProductApiController', 'showProducts');
$router->addRoute('productos', 'POST', 'ProductApiController', 'agregarProd');
$router->addRoute('productos/:ID', 'DELETE', 'ProductApiController', 'borrarProd');
$router->addRoute('productos/:ID', 'PUT', 'ProductApiController', 'updateProd');


$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);