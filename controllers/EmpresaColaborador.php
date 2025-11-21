<?php

class EmpresaColaboradorController {
    public function getEmpresaColaboradorByColId($id) {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'empresaColaborador',
            'alias' => 't',
            'select' => [
                't.empId',
                't.colId',
                'c.colNombre',
                'c.colApellido',
                'c.colEdad',
                'c.colTelefono',
                'c.colCorreo',
                'em.empRazonSocial',
                'em.empNombreComercial',
                'em.empNit',
                'em.empTelefono',
                'em.empCorreo',
            ],
            'joins'=> array(
                array(
                    'tabla' => 'pdcEmpresas',
                    'alias' => 'em',
                    'on' => 't.empId = em.empId'
                ),
                array(
                    'tabla' => 'pdcColaboradores',
                    'alias' => 'c',
                    'on' => 't.colId = c.colId'
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.colId = '.$id,
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        return $resultado;
    }

    public function getEmpresaColaboradorByEmpId($id) {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'empresaColaborador',
            'alias' => 't',
            'select' => [
                't.empId',
                't.colId',
                'c.colNombre',
                'c.colApellido',
                'c.colEdad',
                'c.colTelefono',
                'c.colCorreo',
                'em.empRazonSocial',
                'em.empNombreComercial',
                'em.empNit',
                'em.empTelefono',
                'em.empCorreo',
            ],
            'joins'=> array(
                array(
                    'tabla' => 'pdcEmpresas',
                    'alias' => 'em',
                    'on' => 't.empId = em.empId'
                ),
                array(
                    'tabla' => 'pdcColaboradores',
                    'alias' => 'c',
                    'on' => 't.colId = c.colId'
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.empId = '.$id,
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        return $resultado;
    }

    public function getEmpresaColaboradorByEmpColId($empId, $colId) {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'empresaColaborador',
            'alias' => 't',
            'select' => [
                't.empId',
                't.colId',
                'c.colNombre',
                'c.colApellido',
                'c.colEdad',
                'c.colTelefono',
                'c.colCorreo',
                'em.empRazonSocial',
                'em.empNombreComercial',
                'em.empNit',
                'em.empTelefono',
                'em.empCorreo',
            ],
            'joins'=> array(
                array(
                    'tabla' => 'pdcEmpresas',
                    'alias' => 'em',
                    'on' => 't.empId = em.empId'
                ),
                array(
                    'tabla' => 'pdcColaboradores',
                    'alias' => 'c',
                    'on' => 't.colId = c.colId'
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.empId = '.$empId,
                    'values'=> array(),
                    'type'=> 'add',
                ),
                array(
                    'where'=> 't.colId = '.$colId,
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        return $resultado;
    }

    public function insertEmpresaColaborador($empId, $colId) {
        $mysql = "INSERT INTO empresa_colaborador (pdc_emp_id, pdc_col_id) VALUES($empId, $colId)";
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute_direct($mysql, 'insert');

        if(!isset($resultado['error'])){
            return array('success'=>true, 'mensaje'=>'Registro exitoso');
        }else{
            var_dump($resultado);die;
        }

    }

    public static function deleteEmpresaColaborador($empId, $colId) {
        $mysql = "DELETE FROM empresa_colaborador WHERE pdc_emp_id = ".$empId ." AND pdc_col_id = ".$colId;
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute_direct($mysql, 'delete');

        if(!isset($resultado['error'])){
            return array('success'=>true, 'mensaje'=>'Eliminacion exitosa');
        }else{
            var_dump($resultado);die;
        }
    }
}