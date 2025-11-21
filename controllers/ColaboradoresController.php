<?php

class ColaboradoresController {
    public function getColaboradores() {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'pdcColaboradores',
            'alias' => 't',
            'select' => [
                't.colId',
                't.colNombre',
                't.colApellido',
                't.colEdad',
                't.colTelefono',
                't.colCorreo',
            ],
            'joins'=> array(),
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

    public function getColaboradoresById($id) {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'pdcColaboradores',
            'alias' => 't',
            'select' => [
                't.colId',
                't.colNombre',
                't.colApellido',
                't.colEdad',
                't.colTelefono',
                't.colCorreo',
            ],
            'joins'=> array(),
            'where'=> array(
                array(
                    'where'=> 't.eliminado = "0" ',
                    'values'=> array(),
                    'type'=> 'add',
                ),
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

    public static function insertColaboradores(Request $request) {
        $mysql = array(
            'tipo' => 'insert',
            'tabla' => 'pdcColaboradores',
            'campos' => array(
                array(
                    'campo' => 'colNombre',
                    'valor' => $request->input('colNombre'),
                ),
                array(
                    'campo' => 'colApellido',
                    'valor' => $request->input('colApellido'),
                ),
                array(
                    'campo' => 'colEdad',
                    'valor' => $request->input('colEdad'),
                ),
                array(
                    'campo' => 'colTelefono',
                    'valor' => $request->input('colTelefono'),
                ),
                array(
                    'campo' => 'colCorreo',
                    'valor' => $request->input('colCorreo'),
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_colaboradores');
        }else{
            var_dump($resultado);die;
        }

        return $resultado;
    }

    public static function updateColaboradores(Request $request) {
        $mysql = array(
            'tipo' => 'update',
            'tabla' => 'pdcColaboradores',
            'campos' => array(
                array(
                    'campo' => 'colNombre',
                    'valor' => $request->input('colNombre'),
                ),
                array(
                    'campo' => 'colApellido',
                    'valor' => $request->input('colApellido'),
                ),
                array(
                    'campo' => 'colEdad',
                    'valor' => $request->input('colEdad'),
                ),
                array(
                    'campo' => 'colTelefono',
                    'valor' => $request->input('colTelefono'),
                ),
                array(
                    'campo' => 'colCorreo',
                    'valor' => $request->input('colCorreo'),
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.colId = '.$request->input('colId'),
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_colaboradores');
        }else{
            var_dump($resultado);die;
        }

        return $resultado;
    }

    public static function deleteColaboradores(Request $request) {
        $mysql = array(
            'tipo' => 'update',
            'tabla' => 'pdcColaboradores',
            'campos' => array(
                array(
                    'campo' => 'eliminado',
                    'valor' => '1',
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.colId = '.$request->query('id'),
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_colaboradores');
        }else{
            var_dump($resultado);die;
        }
    }
}