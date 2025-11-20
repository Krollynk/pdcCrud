<?php

class EmpresasController {
    public function getEmpresas() {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'pdcEmpresas',
            'alias' => 't',
            'select' => [
                't.empId',
                't.empNombreComercial',
                't.empRazonSocial',
                't.empNit',
                't.empTelefono',
                't.empCorreo',
                't.paiId',
                't.depId',
                't.munId',
                'm.munMunicipio',
                'd.depDepartamento',
                'p.paiPais',
            ],
            'joins'=> array(
                array(
                    'tabla' => 'pdcMunicipios',
                    'alias' => 'm',
                    'on' => 't.munId = m.munId'
                ),
                array(
                    'tabla' => 'pdcDepartamentos',
                    'alias' => 'd',
                    'on' => 't.depId = d.depId'
                ),
                array(
                    'tabla' => 'pdcPais',
                    'alias' => 'p',
                    'on' => 't.paiId = p.paiId'
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.eliminado = "0" ',
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        return $resultado;
    }

    public function getEmpresasById($id) {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'pdcEmpresas',
            'alias' => 't',
            'select' => [
                't.empId',
                't.empNombreComercial',
                't.empRazonSocial',
                't.empNit',
                't.empTelefono',
                't.empCorreo',
                't.paiId',
                't.depId',
                't.munId',
                'm.munMunicipio',
                'd.depDepartamento',
                'p.paiPais',
            ],
            'joins'=> array(
                array(
                    'tabla' => 'pdcMunicipios',
                    'alias' => 'm',
                    'on' => 't.munId = m.munId'
                ),
                array(
                    'tabla' => 'pdcDepartamentos',
                    'alias' => 'd',
                    'on' => 't.depId = d.depId'
                ),
                array(
                    'tabla' => 'pdcPais',
                    'alias' => 'p',
                    'on' => 't.paiId = p.paiId'
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.eliminado = "0" ',
                    'values'=> array(),
                    'type'=> 'add',
                ),
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

    public static function insertEmpresas(Request $request) {
        $mysql = array(
            'tipo' => 'insert',
            'tabla' => 'pdcEmpresas',
            'campos' => array(
                array(
                    'campo' => 'empNombreComercial',
                    'valor' => $request->input('empNombreComercial'),
                ),
                array(
                    'campo' => 'empRazonSocial',
                    'valor' => $request->input('empRazonSocial'),
                ),
                array(
                    'campo' => 'empNit',
                    'valor' => $request->input('empNit'),
                ),
                array(
                    'campo' => 'empTelefono',
                    'valor' => $request->input('empTelefono'),
                ),
                array(
                    'campo' => 'empCorreo',
                    'valor' => $request->input('empCorreo'),
                ),
                array(
                    'campo' => 'paiId',
                    'valor' => $request->input('paiPais'),
                ),
                array(
                    'campo' => 'depId',
                    'valor' => $request->input('depDepartamento'),
                ),
                array(
                    'campo' => 'munId',
                    'valor' => $request->input('munMunicipio'),
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_empresas');
        }else{
            var_dump($resultado);die;
        }

        return $resultado;
    }

    public static function updateEmpresas(Request $request) {
        $mysql = array(
            'tipo' => 'update',
            'tabla' => 'pdcEmpresas',
            'campos' => array(
                array(
                    'campo' => 'empNombreComercial',
                    'valor' => $request->input('empNombreComercial'),
                ),
                array(
                    'campo' => 'empRazonSocial',
                    'valor' => $request->input('empRazonSocial'),
                ),
                array(
                    'campo' => 'empNit',
                    'valor' => $request->input('empNit'),
                ),
                array(
                    'campo' => 'empTelefono',
                    'valor' => $request->input('empTelefono'),
                ),
                array(
                    'campo' => 'empCorreo',
                    'valor' => $request->input('empCorreo'),
                ),
                array(
                    'campo' => 'paiId',
                    'valor' => $request->input('paiPais'),
                ),
                array(
                    'campo' => 'depId',
                    'valor' => $request->input('depDepartamento'),
                ),
                array(
                    'campo' => 'munId',
                    'valor' => $request->input('munMunicipio'),
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.empId = '.$request->input('empId'),
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_empresas');
        }else{
            var_dump($resultado);die;
        }

        return $resultado;
    }

    public static function deleteEmpresas(Request $request) {
        $mysql = array(
            'tipo' => 'update',
            'tabla' => 'pdcEmpresas',
            'campos' => array(
                array(
                    'campo' => 'eliminado',
                    'valor' => '1',
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.empId = '.$request->query('id'),
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_empresas');
        }else{
            var_dump($resultado);die;
        }
    }
}