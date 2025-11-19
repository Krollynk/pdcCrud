<?php

class PaisesController {
    public function getPaises() {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'labLaboratorios',
            'alias' => 't',
            'select' => [
                't.laboratorioId',
                't.laboratorioCodigo',
                't.laboratorioNombre',
                't.laboratorioTelefono',
                't.laboratorioCorreo',
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
}