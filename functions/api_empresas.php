<?php
include '../config/data_source.php';
include '../models/ModelMapper.php';
include '../core/DatabaseExecutor.php';
include '../core/QueryBuilder.php';
include '../controllers/EmpresasController.php';


$controller = new EmpresasController();
$resultado = $controller->getEmpresas();
$data_array = array();

if(count($resultado) > 0) {
    foreach($resultado as $row){
        $data_array[] = [
            "id" => $row["empId"],
            "nombre" => $row["empRazonSocial"],
        ];
    }
}

echo json_encode($data_array);