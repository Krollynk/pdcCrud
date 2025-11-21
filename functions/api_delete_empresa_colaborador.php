<?php
include '../config/data_source.php';
include '../models/ModelMapper.php';
include '../core/DatabaseExecutor.php';
include '../core/QueryBuilder.php';
include '../controllers/EmpresaColaborador.php';

$input = json_decode(file_get_contents("php://input"), true);
$controller = new EmpresaColaboradorController();

$resultado = $controller->deleteEmpresaColaborador($input["empId"], $input["colId"]);

echo json_encode($resultado);