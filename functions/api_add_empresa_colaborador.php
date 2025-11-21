<?php
include '../config/data_source.php';
include '../models/ModelMapper.php';
include '../core/DatabaseExecutor.php';
include '../core/QueryBuilder.php';
include '../controllers/EmpresaColaborador.php';

$input = json_decode(file_get_contents("php://input"), true);
$controller = new EmpresaColaboradorController();
$get_resultado = $controller->getEmpresaColaboradorByEmpColId($input["empresaId"], $input["colId"]);
if(count($get_resultado) > 0){
    echo json_encode([ "success" => false, "message" => "Ya está relacionada." ]);
    exit;
}

$resultado = $controller->insertEmpresaColaborador($input["empresaId"], $input["colId"]);

echo json_encode($resultado);