<?php

class MunicipiosController {
    public function getMunicipios() {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'pdcMunicipios',
            'alias' => 't',
            'select' => [
                't.munId',
                't.munMunicipio',
                't.depId',
                'p.depDepartamento',
                'p.paiId',
                's.paiPais'
            ],
            'joins'=> array(
                array(
                    'tabla' => 'pdcDepartamentos',
                    'alias' => 'p',
                    'on' => 't.depId = p.depId'
                ),
                array(
                    'tabla' => 'pdcPais',
                    'alias' => 's',
                    'on' => 'p.paiId = s.paiId'
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

    public function getMunicipiosById($id) {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'pdcMunicipios',
            'alias' => 't',
            'select' => [
                't.munId',
                't.munMunicipio',
                't.depId',
                'p.depDepartamento',
                'p.paiId',
                's.paiPais'
            ],
            'joins'=> array(
                array(
                    'tabla' => 'pdcDepartamentos',
                    'alias' => 'p',
                    'on' => 't.depId = p.depId'
                ),
                array(
                    'tabla' => 'pdcPais',
                    'alias' => 's',
                    'on' => 'p.paiId = s.paiId'
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.eliminado = "0" ',
                    'values'=> array(),
                    'type'=> 'add',
                ),
                array(
                    'where'=> 't.munId = '.$id,
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        return $resultado;
    }

    public static function insertMunicipios(Request $request) {
        $mysql = array(
            'tipo' => 'insert',
            'tabla' => 'pdcMunicipios',
            'campos' => array(
                array(
                    'campo' => 'munMunicipio',
                    'valor' => $request->input('munMunicipio'),
                ),
                array(
                    'campo' => 'depId',
                    'valor' => $request->input('depDepartamento'),
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_municipios');
        }else{
            var_dump($resultado);die;
        }

        return $resultado;
    }

    public static function updateMunicipios(Request $request) {
        $mysql = array(
            'tipo' => 'update',
            'tabla' => 'pdcMunicipios',
            'campos' => array(
                array(
                    'campo' => 'munMunicipio',
                    'valor' => $request->input('munMunicipio'),
                ),
                array(
                    'campo' => 'depId',
                    'valor' => $request->input('depDepartamento'),
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.munId = '.$request->input('munId'),
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_municipios');
        }else{
            var_dump($resultado);die;
        }

        return $resultado;
    }

    public static function deleteMunicipios(Request $request) {
        $mysql = array(
            'tipo' => 'update',
            'tabla' => 'pdcMunicipios',
            'campos' => array(
                array(
                    'campo' => 'eliminado',
                    'valor' => '1',
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.munId = '.$request->query('id'),
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_municipios');
        }else{
            var_dump($resultado);die;
        }
    }
}