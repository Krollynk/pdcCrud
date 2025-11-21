<div class="grid_box main_content">
    <div class="title_bar">
        <h2>Detalle de Empresa</h2>
        <a class="btn-agregar" href="/view_empresas">Regresar</a>
    </div>
    <div class="main_form" id="main_form">
        <input type="hidden" class="empId" name="empId" value="<?php echo $resultado[0]['empId']; ?>">

        <div class="main_div">
            <p>Nombre Comercial</p>
            <input size="60" type="text" class="empNombreComercial input_view" name="empNombreComercial"
                   value="<?php echo $resultado[0]['empNombreComercial']; ?>" autocomplete="off" required>
        </div>
        <div class="main_div">
            <p>Razon Social</p>
            <input size="60" type="text" class="empRazonSocial input_view" name="empRazonSocial"
                   value="<?php echo $resultado[0]['empRazonSocial']; ?>" autocomplete="off" disabled>
        </div>
        <div class="main_div">
            <p>NIT</p>
            <input size="30" type="text" class="empNit input_view" name="empNit"
                   value="<?php echo $resultado[0]['empNit']; ?>" autocomplete="off" disabled>
        </div>
        <div class="main_div">
            <p>Telefono</p>
            <input size="30" type="text" class="empTelefono input_view" name="empTelefono"
                   value="<?php echo $resultado[0]['empTelefono']; ?>" autocomplete="off" disabled>
        </div>
        <div class="main_div">
            <p>Correo</p>
            <input size="30" type="text" class="empCorreo input_view" name="empCorreo"
                   value="<?php echo $resultado[0]['empCorreo']; ?>" autocomplete="off" disabled>
        </div>
        <div class="main_div">
            <p>Municipio</p>
            <input size="30" type="text" class="munMunicipio input_view" name="munMunicipio"
                   value="<?php echo $resultado[0]['munMunicipio']; ?>" autocomplete="off" disabled>
        </div>
        <div class="main_div">
            <p>Departamento</p>
            <input size="30" type="text" class="depDepartamento input_view" name="depDepartamento"
                   value="<?php echo $resultado[0]['depDepartamento']; ?>" autocomplete="off" disabled>
        </div>
        <div class="main_div">
            <p>Pais</p>
            <input size="30" type="text" class="paiPais input_view" name="paiPais"
                   value="<?php echo $resultado[0]['paiPais']; ?>" autocomplete="off" disabled>
        </div>

        <h2>Lista de Colaboradores Asociados</h2>
    </div>
    <br>
    <table class="main_table" id="main_table">
        <thead>
        <tr>
            <th width="20%">Nombre</th>
            <th width="20%">Apellido</th>
            <th width="20%">Edad</th>
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
    const empId = <?php echo json_encode($resultado[0]['empId']); ?>;
    let registros = [];
</script>
<script src="../js/jsDataColaboradores.js"></script>
<script src="../js/jsDisplayTables.js"></script>