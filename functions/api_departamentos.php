<?php
include '../config/data_source.php';
include '../models/ModelMapper.php';
include '../core/DatabaseExecutor.php';
include '../core/QueryBuilder.php';
include '../controllers/DepartamentosController.php';


$controller = new DepartamentosController();
$resultado = $controller->getDepartamentos();
$data_array = array();

if(count($resultado) > 0) {
    foreach($resultado as $row){
        $data_array[] = [
            "id" => $row["depId"],
            "nombre" => $row["depDepartamento"],
            "paiId" => $row["paiId"],
        ];
    }
}

echo json_encode($data_array);