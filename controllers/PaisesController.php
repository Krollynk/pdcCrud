<?php

class PaisesController {
    public function getPaises() {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'pdcPais',
            'alias' => 't',
            'select' => [
                't.paiId',
                't.paiPais',
                't.paiSiglas',
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

    public function getPaisesById($id) {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'pdcPais',
            'alias' => 't',
            'select' => [
                't.paiId',
                't.paiPais',
                't.paiSiglas',
            ],
            'joins'=> array(),
            'where'=> array(
                array(
                    'where'=> 't.eliminado = "0" ',
                    'values'=> array(),
                    'type'=> 'add',
                ),
                array(
                    'where'=> 't.paiId = '.$id,
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        return $resultado;
    }

    public static function insertPaises(Request $request) {
        $mysql = array(
            'tipo' => 'insert',
            'tabla' => 'pdcPais',
            'campos' => array(
                array(
                    'campo' => 'paiPais',
                    'valor' => $request->input('paiPais'),
                ),
                array(
                    'campo' => 'paiSiglas',
                    'valor' => $request->input('paiSiglas'),
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_paises');
        }else{
            var_dump($resultado);die;
        }

        return $resultado;
    }

    public static function updatePaises(Request $request) {
        $mysql = array(
            'tipo' => 'update',
            'tabla' => 'pdcPais',
            'campos' => array(
                array(
                    'campo' => 'paiPais',
                    'valor' => $request->input('paiPais'),
                ),
                array(
                    'campo' => 'paiSiglas',
                    'valor' => $request->input('paiSiglas'),
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.paiId = '.$request->input('paiId'),
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_paises');
        }else{
            var_dump($resultado);die;
        }

        return $resultado;
    }

    public static function deletePaises(Request $request) {
        $mysql = array(
            'tipo' => 'update',
            'tabla' => 'pdcPais',
            'campos' => array(
                array(
                    'campo' => 'eliminado',
                    'valor' => '1',
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.paiId = '.$request->query('id'),
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_paises');
        }else{
            var_dump($resultado);die;
        }
    }
}