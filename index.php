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
require_once __DIR__ . '/controllers/DepartamentosController.php';

$request = new Request();
$response = new Response();
$router = new Router();

//ruta raíz
$router->get('/', [MainController::class, 'viewPaises']);

//rutas get
//paises
$router->get('/view_paises', [MainController::class, 'viewPaises']);
$router->get('/view_paises_nuevo', [MainController::class, 'viewPaisesNuevo']);
$router->get('/view_paises_editar', [MainController::class, 'viewPaisesEditar']);
$router->get('/paises_eliminar', [PaisesController::class, 'deletePaises']);
//departamentos
$router->get('/view_departamentos', [MainController::class, 'viewDepartamentos']);
$router->get('/view_departamentos_nuevo', [MainController::class, 'viewDepartamentosNuevo']);
$router->get('/view_departamentos_editar', [MainController::class, 'viewDepartamentosEditar']);
$router->get('/departamentos_eliminar', [DepartamentosController::class, 'deleteDepartamentos']);

//rutas post
$router->post('/guardar_pais', [PaisesController::class, 'insertPaises']);
$router->post('/actualizar_pais', [PaisesController::class, 'updatePaises']);
$router->post('/guardar_departamento', [DepartamentosController::class, 'insertDepartamentos']);
$router->post('/actualizar_departamento', [DepartamentosController::class, 'updateDepartamentos']);

$router->dispatch($request);