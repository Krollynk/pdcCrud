<?php
include '../config/data_source.php';
include '../models/ModelMapper.php';
include '../core/DatabaseExecutor.php';
include '../core/QueryBuilder.php';
include '../controllers/MunicipiosController.php';


$controller = new MunicipiosController();
$resultado = $controller->getMunicipios();
$paises_array = array();

if(count($resultado) > 0) {
    foreach($resultado as $row){
        $paises_array[] = [
            "id" => $row["munId"],
            "nombre" => $row["munMunicipio"],
            "depId" => $row["depId"],
            "paiId" => $row["paiId"],
        ];
    }
}

echo json_encode($paises_array);