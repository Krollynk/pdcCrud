<?php

class DepartamentosController {
    public function getDepartamentos() {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'pdcDepartamentos',
            'alias' => 't',
            'select' => [
                't.depId',
                't.depDepartamento',
                't.paiId',
                'p.paiPais',
            ],
            'joins'=> array(
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

    public function getDepartamentosById($id) {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'pdcDepartamentos',
            'alias' => 't',
            'select' => [
                't.depId',
                't.depDepartamento',
                't.paiId',
                'p.paiPais',
            ],
            'joins'=> array(
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
                    'where'=> 't.depId = '.$id,
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        return $resultado;
    }

    public static function insertDepartamentos(Request $request) {
        $mysql = array(
            'tipo' => 'insert',
            'tabla' => 'pdcDepartamentos',
            'campos' => array(
                array(
                    'campo' => 'depDepartamento',
                    'valor' => $request->input('depDepartamento'),
                ),
                array(
                    'campo' => 'paiId',
                    'valor' => $request->input('paiPais'),
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_departamentos');
        }else{
            var_dump($resultado);die;
        }

        return $resultado;
    }

    public static function updateDepartamentos(Request $request) {
        $mysql = array(
            'tipo' => 'update',
            'tabla' => 'pdcDepartamentos',
            'campos' => array(
                array(
                    'campo' => 'depDepartamento',
                    'valor' => $request->input('depDepartamento'),
                ),
                array(
                    'campo' => 'paiId',
                    'valor' => $request->input('paiPais'),
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.depId = '.$request->input('depId'),
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_departamentos');
        }else{
            var_dump($resultado);die;
        }

        return $resultado;
    }

    public static function deleteDepartamentos(Request $request) {
        $mysql = array(
            'tipo' => 'update',
            'tabla' => 'pdcDepartamentos',
            'campos' => array(
                array(
                    'campo' => 'eliminado',
                    'valor' => '1',
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.depId = '.$request->query('id'),
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_departamentos');
        }else{
            var_dump($resultado);die;
        }
    }
}