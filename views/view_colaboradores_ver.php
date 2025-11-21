<div class="grid_box main_content">
    <div class="title_bar">
        <h2>Editar Colaborador</h2>
        <a class="btn-agregar" href="/view_colaboradores">Regresar</a>
    </div>
    <div class="main_form" id="main_form">
        <input type="hidden" class="colId" name="colId" value="<?php echo $resultado[0]['colId']; ?>">

        <div class="main_div">
            <p>Nombre</p>
            <input size="60" type="text" class="colNombre input_view" name="colNombre"
                   value="<?php echo $resultado[0]['colNombre']; ?>" autocomplete="off" disabled>
        </div>
        <div class="main_div">
            <p>Apellido</p>
            <input size="60" type="text" class="colApellido input_view" name="colApellido"
                   value="<?php echo $resultado[0]['colApellido']; ?>" autocomplete="off" disabled>
        </div>
        <div class="main_div">
            <p>Edad</p>
            <input size="30" type="text" class="colEdad input_view" name="colEdad"
                   value="<?php echo $resultado[0]['colEdad']; ?>" autocomplete="off" disabled>
        </div>
        <div class="main_div">
            <p>Teléfono</p>
            <input size="30" type="text" class="colTelefono input_view" name="colTelefono"
                   value="<?php echo $resultado[0]['colTelefono']; ?>" autocomplete="off" disabled>
        </div>
        <div class="main_div">
            <p>Correo</p>
            <input size="30" type="email" class="colCorreo input_view" name="colCorreo"
                   value="<?php echo $resultado[0]['colCorreo']; ?>" autocomplete="off" disabled>
        </div>
        <h2>Empresas Asociadas</h2>
    </div>
    <br>
    <table class="main_table" id="main_table">
        <thead>
        <tr>
            <th width="20%">Nombre Comercial</th>
            <th width="20%">Razón social</th>
            <th width="20%">NIT</th>
            <th width="20%">Correo</th>
            <th width="20%">teléfono</th>
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
    const colId = <?php echo json_encode($resultado[0]['colId']); ?>;
    let registros = [];
</script>
<script src="../js/jsDataSelectEmpresas.js"></script>
<script src="../js/jsDisplayTables.js"></script>