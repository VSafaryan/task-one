<?php

require_once '../vendor/autoload.php';
include '../config/database.php';

use src\TestController;
use src\Http\Controllers\DatabaseController;
use src\Http\Controllers\InfoController;
use \Symfony\Component\Routing\Route;
use \Symfony\Component\Routing\RouteCollection;

#$routes = new RouteCollection();

#$route = new Route('/gago', ['_controller' => InfoController::class]);

#$routes->add('insertInfo', $route);

$test = new InfoController();

$test->insertInfo();

echo json_encode(['host'=>HOST]) ;