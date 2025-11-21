<?php
include '../config/data_source.php';
include '../models/ModelMapper.php';
include '../core/DatabaseExecutor.php';
include '../core/QueryBuilder.php';
include '../controllers/EmpresaColaborador.php';


$controller = new EmpresaColaboradorController();
$resultado = $controller->getEmpresaColaboradorByColId($_GET['colId']);
$data_array = array();

if(count($resultado) > 0) {
    foreach($resultado as $row){
        $data_array[] = [
            "empId" => $row["empId"],
            "colId" => $row["colId"],
            "empNombreComercial" => $row["empNombreComercial"],
            "empRazonSocial" => $row["empRazonSocial"],
            "empNit" => $row["empNit"],
            "empTelefono" => $row["empTelefono"],
            "empCorreo" => $row["empCorreo"],
        ];
    }
}

echo json_encode($data_array);