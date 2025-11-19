<?php
include '../config/data_source.php';
include '../models/ModelMapper.php';
include '../core/DatabaseExecutor.php';
include '../core/QueryBuilder.php';
include '../controllers/PaisesController.php';


$controller = new PaisesController();
$resultado = $controller->getPaises();
$paises_array = array();

if(count($resultado) > 0) {
    foreach($resultado as $row){
        $paises_array[] = [
            "id" => $row["paiId"],
            "nombre" => $row["paiPais"]
        ];
    }
}

echo json_encode($paises_array);