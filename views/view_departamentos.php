<div class="main_content">
    <div class="title_bar">
        <h2>Listado de Departamentos</h2>
        <a href="/view_departamentos_nuevo" class="btn-agregar">Agregar</a>
    </div>
    <table class="main_table" id="main_table">
        <thead>
        <tr>
            <th width="35%">Departamento</th>
            <th width="35%">País</th>
            <th width="30%">Acciones</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
    <div class="pagination">
        <button id="btnAnterior" disabled>Anterior</button>
        <button id="btnSiguiente" disabled>Siguiente</button>
    </div>
</div>
<script>
    const registros = <?php echo json_encode($data); ?>;
</script>
<script src="/js/jsDisplayTables.js"></script>