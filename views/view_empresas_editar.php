<div class="grid_box main_content">
    <div class="title_bar">
        <h2>Editar Empresa</h2>
        <button type="submit" form="main_form" class="btn-agregar">Agregar</button>
    </div>
    <form action="/actualizar_empresa" class="main_form" id="main_form" method="post">
        <input type="hidden" class="empId" name="empId" value="<?php echo $resultado[0]['empId']; ?>">

        <div class="main_div">
            <p>Nombre Comercial</p>
            <input size="60" type="text" class="empNombreComercial input_text" name="empNombreComercial"
                   value="<?php echo $resultado[0]['empNombreComercial']; ?>" autocomplete="off" required>
        </div>
        <div class="main_div">
            <p>Razon Social</p>
            <input size="60" type="text" class="empRazonSocial input_text" name="empRazonSocial"
                   value="<?php echo $resultado[0]['empRazonSocial']; ?>" autocomplete="off" required>
        </div>
        <div class="main_div">
            <p>NIT</p>
            <input size="30" type="text" class="empNit input_text" name="empNit"
                   value="<?php echo $resultado[0]['empNit']; ?>" autocomplete="off" required>
        </div>
        <div class="main_div">
            <p>Telefono</p>
            <input size="30" type="text" class="empTelefono input_text" name="empTelefono"
                   value="<?php echo $resultado[0]['empTelefono']; ?>" autocomplete="off" required>
        </div>
        <div class="main_div">
            <p>Correo</p>
            <input size="30" type="text" class="empCorreo input_text" name="empCorreo"
                   value="<?php echo $resultado[0]['empCorreo']; ?>" autocomplete="off" required>
        </div>
        <div class="main_div">
            <p>Municipio</p>
            <select class="munMunicipio input_text" name="munMunicipio" id="dataSelectMunicipio" required></select>
        </div>
        <div class="main_div">
            <p>Departamento</p>
            <select class="depDepartamento input_text" name="depDepartamento" id="dataSelectDepartamento" required></select>
        </div>
        <div class="main_div">
            <p>Pais</p>
            <select class="paiPais input_text" name="paiPais" id="dataSelectPais" required></select>
        </div>
    </form>
</div>
<script>
    const registros = <?php echo json_encode($data); ?>;
</script>
<script src="../js/jsDataSelectPaises.js"></script>
<script src="../js/jsDataSelectDepartamentos.js"></script>
<script src="../js/jsDataSelectMunicipios.js"></script>