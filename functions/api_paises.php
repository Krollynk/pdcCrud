<?php
include '../config/data_source.php';
include '../models/ModelMapper.php';
include '../core/DatabaseExecutor.php';
include '../core/QueryBuilder.php';
include '../controllers/PaisesController.php';


$controller = new PaisesController();
$resultado = $controller->getPaises();
$data_array = array();

if(count($resultado) > 0) {
    foreach($resultado as $row){
        $data_array[] = [
            "id" => $row["paiId"],
            "nombre" => $row["paiPais"]
        ];
    }
}

echo json_encode($data_array);