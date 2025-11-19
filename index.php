<?php
require_once __DIR__ . '/config/data_source.php';
require_once __DIR__ . '/models/ModelMapper.php';
require_once __DIR__ . '/core/DatabaseExecutor.php';
require_once __DIR__ . '/core/QueryBuilder.php';
require_once __DIR__ . '/core/Router.php';
require_once __DIR__ . '/core/Request.php';
require_once __DIR__ . '/core/Response.php';
require_once __DIR__ . '/functions/view_helper.php';
require_once __DIR__ . '/controllers/MainController.php';
require_once __DIR__ . '/controllers/PaisesController.php';

$request = new Request();
$response = new Response();
$router = new Router();


$router->get('/', [MainController::class, 'viewPaises']);

$router->get('/view_paises', [MainController::class, 'viewPaises']);
$router->get('/view_paises_nuevo', [MainController::class, 'viewPaisesNuevo']);
$router->get('/view_paises_editar', [MainController::class, 'viewPaisesEditar']);

$router->dispatch($request);