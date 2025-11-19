<?php

class MainController {
    public static function viewPaises()
    {
        $controller = new PaisesController();
        $resultado = $controller->getPaises();
        renderLayout('view_paises', $resultado);
    }
    public static function viewPaisesNuevo()
    {
        renderLayout('view_paises_nuevo');
    }
    public static function viewPaisesEditar(Request $request)
    {
        $controller = new PaisesController();
        $resultado = $controller->getPaisesById($request->query('id'));
        renderLayout('view_paises_editar', $resultado);
    }
}