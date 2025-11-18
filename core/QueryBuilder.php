<?php
class QueryBuilder {
    private $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function run(){
        if($this->data['tipo'] == 'select'){
            return $this->buildSelect($this->data);
        }else if($this->data['tipo'] == 'update'){
            return $this->buildUpdate($this->data);
        }else if($this->data['tipo'] == 'insert'){
            return $this->buildInsert($this->data);
        }
    }

    public function buildSelect($data) {
        $mainTable = ModelMapper::getTableName($data['tabla']);
        $alias = $data['alias'];
        $lista_tablas[$alias] = $data['tabla'];
        $sql_join = '';

        if( isset($data['joins']) &&
            !empty($data['joins'])
        ) {
            foreach ($data['joins'] as $join) {
                $joinTable = ModelMapper::getTableName($join['tabla']);
                $lista_tablas[$join['alias']] = $join['tabla'];

                [$stm1, $stm2] = explode('=', $join['on']);
                $stm1 = trim($stm1);
                $stm2 = trim($stm2);
                [$alias1, $logicalField1] = explode('.', $stm1);
                [$alias2, $logicalField2] = explode('.', $stm2);
                $physicalOn1 = ModelMapper::getField($lista_tablas[$alias1], $logicalField1);
                $physicalOn2 = ModelMapper::getField($lista_tablas[$alias2], $logicalField2);
                $sql_on = $alias1.".".$physicalOn1 . " = " . $alias2.".".$physicalOn2;
                $sql_join .= " INNER JOIN $joinTable {$join['alias']} ON $sql_on";
            }
        }

        $select = array_map(
            function($campo) use ($lista_tablas) {
                [$alias, $logicalField] = explode('.', $campo);
                $physical = ModelMapper::getField($lista_tablas[$alias], $logicalField);
                return "$alias.$physical AS $logicalField";
            },
            $data['select']
        );

        $sql = "SELECT " . implode(", ", $select) . " FROM $mainTable $alias";
        $sql .= $sql_join;

        $model = ModelMapper::getTablas();
        if (isset($data['where']) && !empty($data['where'])) {
            $sql_where = $this->buildWhereClause($data['where'], $lista_tablas);
            $sql .= " WHERE $sql_where";
        }

        return $sql;
    }

    public function buildInsert($data) {
        $table = ModelMapper::getTableName($data['tabla']);
        $columns = [];
        $values = [];

        foreach ($data['campos'] as $campo) {
            $columns[] = ModelMapper::getField($data['tabla'], $campo['campo']);
            $values[] = "'" . addslashes($campo['valor']) . "'";
        }
        $columns[] = ModelMapper::getField($data['tabla'], 'eliminado');
        $values[] = "'" . addslashes('0') . "'";
        $columns[] = ModelMapper::getField($data['tabla'], 'fechaCreado');
        $values[] = addslashes('NOW()');

        return "INSERT INTO $table (" . implode(",", $columns) . ") VALUES (" . implode(",", $values) . ")";
    }

    public function buildUpdate($data) {
        $table = ModelMapper::getTableName($data['tabla']);
        $set = [];

        foreach ($data['campos'] as $campo) {
            $col = ModelMapper::getField($data['tabla'], $campo['campo']);
            $set[] = "$col = '" . addslashes($campo['valor']) . "'";
        }

        $sql = "UPDATE $table SET " . implode(", ", $set);
        $whereClause = array();
        if (isset($data['where']) && !empty($data['where'])) {
            $sql_where = $this->buildWhereClauseUpdate($data['where'], $data['tabla']);
            $sql .= " WHERE $sql_where";
        }else{
            var_dump("hace falta el where"); die;
        }
        return $sql;
    }

    private function buildWhereClause(array $whereData, array $tablaAliasMap): string {
        $whereClauses = [];

        foreach ($whereData as $group) {
            if (!isset($group['where'])) continue;

            $type = strtolower($group['type'] ?? 'add');

            if ($type === 'wherein') {
                $logical = trim($group['where']); // Ej: t.admUsuarioRol
                $values = $group['values'] ?? [];

                if (empty($values)) continue;

                if (strpos($logical, '.') !== false) {
                    [$alias, $logicalField] = explode('.', $logical);
                    if (!isset($tablaAliasMap[$alias])) continue;
                    $tabla = $tablaAliasMap[$alias];
                    $physicalField = ModelMapper::getField($tabla, $logicalField);
                    $inList = implode(', ', array_map(function($val) {
                        return is_numeric($val) ? $val : '"' . addslashes($val) . '"';
                    }, $values));
                    $whereClauses[] = "$alias.$physicalField IN ($inList)";
                }

                continue; // salta al siguiente
            }

            if ($type === 'between') {
                $logical = trim($group['where']);
                $values = $group['values'] ?? [];

                if (count($values) !== 2) continue; // Debe tener solo dos valores

                if (strpos($logical, '.') !== false) {
                    [$alias, $logicalField] = explode('.', $logical);
                    if (!isset($tablaAliasMap[$alias])) continue;
                    $tabla = $tablaAliasMap[$alias];
                    $physicalField = ModelMapper::getField($tabla, $logicalField);
                    $val1 = is_numeric($values[0]) ? $values[0] : '"' . addslashes($values[0]) . '"';
                    $val2 = is_numeric($values[1]) ? $values[1] : '"' . addslashes($values[1]) . '"';
                    $whereClauses[] = "$alias.$physicalField BETWEEN $val1 AND $val2";
                }
                continue;
            }

            if ($type === 'add') {
                $rawCondition = $group['where'];

                // Primero divido por OR
                $orParts = preg_split('/\bOR\b/i', $rawCondition);
                $orTranslated = [];

                foreach ($orParts as $orPart) {
                    // Dividir por AND internos
                    $andParts = preg_split('/\bAND\b/i', $orPart);
                    $andTranslated = [];

                    foreach ($andParts as $expr) {
                        $expr = trim($expr);
                        $pattern = '/([\w]+)\.([\w]+)\s*(=|<>|!=|>=|<=|>|<|LIKE)\s*(.+)/i';

                        if (preg_match($pattern, $expr, $matches)) {
                            [$_, $alias, $logicalField, $operator, $value] = $matches;

                            if (!isset($tablaAliasMap[$alias])) continue;
                            $tabla = $tablaAliasMap[$alias];
                            $physicalField = ModelMapper::getField($tabla, $logicalField);
                            $andTranslated[] = "$alias.$physicalField $operator '$value'";
                        } else {
                            $andTranslated[] = $expr;
                        }
                    }

                    $orTranslated[] = count($andTranslated) > 1
                        ? '(' . implode(' AND ', $andTranslated) . ')'
                        : $andTranslated[0];
                }

                $whereClauses[] = count($orTranslated) > 1
                    ? '(' . implode(' OR ', $orTranslated) . ')'
                    : $orTranslated[0];
            }
        }

        return implode(' AND ', $whereClauses);
    }
    private function buildWhereClauseUpdate(array $whereData, $tablaWhere): string {
        $whereClauses = [];

        foreach ($whereData as $group) {
            if (!isset($group['where'])) continue;

            $type = strtolower($group['type'] ?? 'add');

            if ($type === 'add') {
                $rawCondition = $group['where'];

                // Primero divido por OR
                $orParts = preg_split('/\bOR\b/i', $rawCondition);
                $orTranslated = [];

                foreach ($orParts as $orPart) {
                    // Dividir por AND internos
                    $andParts = preg_split('/\bAND\b/i', $orPart);
                    $andTranslated = [];

                    foreach ($andParts as $expr) {
                        $expr = trim($expr);
                        $pattern = '/(?:([\w]+)\.)?([\w]+)\s*(=|<>|!=|>=|<=|>|<|LIKE)\s*(.+)/i';

                        if (preg_match($pattern, $expr, $matches)) {
                            [$_, $alias, $logicalField, $operator, $value] = $matches;
                            $tabla = $tablaWhere;
                            $physicalField = ModelMapper::getField($tabla, $logicalField);
                            $andTranslated[] = "$physicalField $operator '$value'";
                        } else {
                            $andTranslated[] = $expr;
                        }
                    }

                    $orTranslated[] = count($andTranslated) > 1
                        ? '(' . implode(' AND ', $andTranslated) . ')'
                        : $andTranslated[0];
                }

                $whereClauses[] = count($orTranslated) > 1
                    ? '(' . implode(' OR ', $orTranslated) . ')'
                    : $orTranslated[0];
            }
        }

        return implode(' AND ', $whereClauses);
    }
}





