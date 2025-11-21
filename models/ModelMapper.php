<?php
// core/ModelMapper.php

class ModelMapper {
    private static $map = [
        'pdcPais' => [
            'table' => 'pdc_pais',
            'fields' => [
                'paiId' => 'pdc_pai_id',
                'paiPais'=> 'pdc_pai_pais',
                'paiSiglas' => 'pdc_pai_siglas',
                'eliminado'=> 'pdc_pai_eliminado',
                'fechaCreado'=> 'pdc_pai_fecha_creado',
            ],
        ],
        'pdcDepartamentos' => [
            'table' => 'pdc_departamentos',
            'fields' => [
                'depId' => 'pdc_dep_id',
                'depDepartamento' => 'pdc_dep_departamento',
                'paiId' => 'pdc_pai_id',
                'eliminado' => 'pdc_dep_eliminado',
                'fechaCreado' => 'pdc_dep_fecha_creado',
            ],
        ],
        'pdcMunicipios' => [
            'table' => 'pdc_municipios',
            'fields' => [
                'munId' => 'pdc_mun_id',
                'munMunicipio' => 'pdc_mun_municipio',
                'depId' => 'pdc_dep_id',
                'eliminado' => 'pdc_dep_eliminado',
                'fechaCreado' => 'pdc_dep_fecha_creado',
            ],
        ],
        'pdcColaboradores' => [
            'table' => 'pdc_colaboradores',
            'fields' => [
                'colId' => 'pdc_col_id',
                'colNombre' => 'pdc_col_nombre',
                'colApellido' => 'pdc_col_apellido',
                'colEdad' => 'pdc_col_edad',
                'colTelefono' => 'pdc_col_telefono',
                'colCorreo' => 'pdc_col_correo',
                'eliminado' => 'pdc_col_eliminado',
                'fechaCreado' => 'pdc_col_fecha_creado',
            ],
        ],
        'pdcEmpresas' => [
            'table' => 'pdc_empresas',
            'fields' => [
                'empId' => 'pdc_emp_id',
                'empNombreComercial' => 'pdc_emp_nombre_comercial',
                'empRazonSocial' => 'pdc_emp_razon_social',
                'empNit' => 'pdc_emp_nit',
                'empTelefono' => 'pdc_emp_telefono',
                'empCorreo' => 'pdc_emp_correo',
                'paiId' => 'pdc_pai_id',
                'depId' => 'pdc_dep_id',
                'munId' => 'pdc_mun_id',
                'eliminado' => 'pdc_emp_eliminado',
                'fechaCreado' => 'pdc_emp_fecha_creado',
            ],
        ],
        'empresaColaborador' => [
            'table' => 'empresa_colaborador',
            'fields' => [
                'empId' => 'pdc_emp_id',
                'colId' => 'pdc_col_id',
            ],
        ],
    ];

    public static function getTableName($logical) {
        return self::$map[$logical]['table'] ?? $logical;
    }

    public static function getField($logicalTable, $logicalField) {
        return self::$map[$logicalTable]['fields'][$logicalField] ?? $logicalField;
    }

    public static function getTablas() {
        return self::$map;
    }
}