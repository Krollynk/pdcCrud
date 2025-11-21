<div class="grid_box main_content">
    <div class="title_bar">
        <h2>Editar Colaborador</h2>
        <button type="submit" form="main_form" class="btn-agregar">Agregar</button>
    </div>
    <form action="/actualizar_colaborador" class="main_form" id="main_form" method="post">
        <input type="hidden" class="colId" name="colId" value="<?php echo $resultado[0]['colId']; ?>">

        <div class="main_div">
            <p>Nombre</p>
            <input size="60" type="text" class="colNombre input_text" name="colNombre"
                   value="<?php echo $resultado[0]['colNombre']; ?>" autocomplete="off" required>
        </div>
        <div class="main_div">
            <p>Apellido</p>
            <input size="60" type="text" class="colApellido input_text" name="colApellido"
                   value="<?php echo $resultado[0]['colApellido']; ?>" autocomplete="off" required>
        </div>
        <div class="main_div">
            <p>Edad</p>
            <input size="30" type="text" class="colEdad input_text" name="colEdad"
                   value="<?php echo $resultado[0]['colEdad']; ?>" autocomplete="off" required>
        </div>
        <div class="main_div">
            <p>Teléfono</p>
            <input size="30" type="text" class="colTelefono input_text" name="colTelefono"
                   value="<?php echo $resultado[0]['colTelefono']; ?>" autocomplete="off" required>
        </div>
        <div class="main_div">
            <p>Correo</p>
            <input size="30" type="email" class="colCorreo input_text" name="colCorreo"
                   value="<?php echo $resultado[0]['colCorreo']; ?>" autocomplete="off" required>
        </div>
        <h2>Asociar empresa a colaborador</h2>
        <div class="main_div">
            <p>Empresa</p>
            <select class="depEmpresa input_text" name="depEmpresa" id="dataSelectEmpresa"></select>
            <button type="button" class="btn-agregar" onclick="agregarEmpresa()">Añadir empresa</button>
        </div>
    </form>
    <br>
    <table class="main_table" id="main_table">
        <thead>
            <tr>
                <th width="25%">Nombre Comercial</th>
                <th width="25%">Correo</th>
                <th width="25%">teléfono</th>
                <th width="25%">Acciones</th>
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