<?php

class MainController {
    public static function viewPaises()
    {
        /*$controller = new ClientesController();*/
        $resultado = []; /*$controller->getClientes();*/
        renderLayout('view_paises'/*, $resultado*/);
    }
    public static function viewPaisesNuevo()
    {
        self::requireAuth();
        renderLayout('view_paises_nuevo');
    }
    public static function viewPaisesEditar(Request $request)
    {
        /*if(empty($request->query('id'))) {
            Response::json(['success'=>false,'mensaje'=>'Debe seleccionar un cliente']);
            return;
        }
        $controller = new ClientesController();
        $resultado = $controller->GetClientesPorId($request->query('id'));*/
        renderLayout('view_paises_editar'/*, $resultado*/);
    }
}