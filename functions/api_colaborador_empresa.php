<?php
include '../config/data_source.php';
include '../models/ModelMapper.php';
include '../core/DatabaseExecutor.php';
include '../core/QueryBuilder.php';
include '../controllers/EmpresaColaborador.php';


$controller = new EmpresaColaboradorController();
$resultado = $controller->getEmpresaColaboradorByEmpId($_GET['empId']);
$data_array = array();
if(count($resultado) > 0) {
    foreach($resultado as $row){
        $data_array[] = [
            "empId" => $row["empId"],
            "colId" => $row["colId"],
            "colNombre" => $row["colNombre"],
            "colApellido" => $row["colApellido"],
            "colEdad" => $row["colEdad"],
            "colTelefono" => $row["colTelefono"],
            "colCorreo" => $row["colCorreo"],
        ];
    }
}

echo json_encode($data_array);