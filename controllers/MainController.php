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
    public static function viewDepartamentos()
    {
        $controller = new DepartamentosController();
        $resultado = $controller->getDepartamentos();
        renderLayout('view_departamentos', $resultado);
    }
    public static function viewDepartamentosNuevo()
    {
        renderLayout('view_departamentos_nuevo');
    }
    public static function viewDepartamentosEditar(Request $request)
    {
        $controller = new DepartamentosController();
        $resultado = $controller->getDepartamentosById($request->query('id'));
        renderLayout('view_departamentos_editar', $resultado);
    }
    public static function viewMunicipios()
    {
        $controller = new MunicipiosController();
        $resultado = $controller->getMunicipios();
        renderLayout('view_municipios', $resultado);
    }
    public static function viewMunicipiosNuevo()
    {
        renderLayout('view_municipios_nuevo');
    }
    public static function viewMunicipiosEditar(Request $request)
    {
        $controller = new MunicipiosController();
        $resultado = $controller->getMunicipiosById($request->query('id'));
        renderLayout('view_municipios_editar', $resultado);
    }
}