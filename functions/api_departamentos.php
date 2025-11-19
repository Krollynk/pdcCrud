<?php
include '../config/data_source.php';
include '../models/ModelMapper.php';
include '../core/DatabaseExecutor.php';
include '../core/QueryBuilder.php';
include '../controllers/DepartamentosController.php';


$controller = new DepartamentosController();
$resultado = $controller->getDepartamentos();
$paises_array = array();

if(count($resultado) > 0) {
    foreach($resultado as $row){
        $paises_array[] = [
            "id" => $row["depId"],
            "nombre" => $row["depDepartamento"]
        ];
    }
}

echo json_encode($paises_array);