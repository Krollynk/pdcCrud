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
require_once __DIR__ . '/controllers/MunicipiosController.php';
require_once __DIR__ . '/controllers/EmpresasController.php';
require_once __DIR__ . '/controllers/ColaboradoresController.php';

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
//municipios
$router->get('/view_municipios', [MainController::class, 'viewMunicipios']);
$router->get('/view_municipios_nuevo', [MainController::class, 'viewMunicipiosNuevo']);
$router->get('/view_municipios_editar', [MainController::class, 'viewMunicipiosEditar']);
$router->get('/municipios_eliminar', [MunicipiosController::class, 'deleteMunicipios']);
//empresas
$router->get('/view_empresas', [MainController::class, 'viewEmpresas']);
$router->get('/view_empresas_nuevo', [MainController::class, 'viewEmpresasNuevo']);
$router->get('/view_empresas_editar', [MainController::class, 'viewEmpresasEditar']);
$router->get('/view_empresas_ver', [MainController::class, 'viewEmpresasVer']);
$router->get('/empresas_eliminar', [EmpresasController::class, 'deleteEmpresas']);
//colaboradores
$router->get('/view_colaboradores', [MainController::class, 'viewColaboradores']);
$router->get('/view_colaboradores_nuevo', [MainController::class, 'viewColaboradoresNuevo']);
$router->get('/view_colaboradores_editar', [MainController::class, 'viewColaboradoresEditar']);
$router->get('/view_colaboradores_ver', [MainController::class, 'viewColaboradoresVer']);
$router->get('/colaboradores_eliminar', [ColaboradoresController::class, 'deleteColaboradores']);

//rutas post
$router->post('/guardar_pais', [PaisesController::class, 'insertPaises']);
$router->post('/actualizar_pais', [PaisesController::class, 'updatePaises']);

$router->post('/guardar_departamento', [DepartamentosController::class, 'insertDepartamentos']);
$router->post('/actualizar_departamento', [DepartamentosController::class, 'updateDepartamentos']);

$router->post('/guardar_municipio', [MunicipiosController::class, 'insertMunicipios']);
$router->post('/actualizar_municipio', [MunicipiosController::class, 'updateMunicipios']);

$router->post('/guardar_empresa', [EmpresasController::class, 'insertEmpresas']);
$router->post('/actualizar_empresa', [EmpresasController::class, 'updateEmpresas']);

$router->post('/guardar_colaborador', [ColaboradoresController::class, 'insertColaboradores']);
$router->post('/actualizar_colaborador', [ColaboradoresController::class, 'updateColaboradores']);

$router->dispatch($request);