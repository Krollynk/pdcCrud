<div class="grid_box main_content">
    <div class="title_bar">
        <h2>Agregar Empresa</h2>
        <button type="submit" form="main_form" class="btn-agregar">Agregar</button>
    </div>
    <form action="/guardar_empresa" class="main_form" id="main_form" method="post">
        <input type="hidden" class="empId" name="empId">

        <div class="main_div">
            <p>Nombre Comercial</p>
            <input size="60" type="text" class="empNombreComercial input_text" name="empNombreComercial" autocomplete="off" required>
        </div>
        <div class="main_div">
            <p>Razon Social</p>
            <input size="60" type="text" class="empRazonSocial input_text" name="empRazonSocial" autocomplete="off" required>
        </div>
        <div class="main_div">
            <p>NIT</p>
            <input size="30" type="text" class="empNit input_text" name="empNit" autocomplete="off" required>
        </div>
        <div class="main_div">
            <p>Telefono</p>
            <input size="30" type="text" class="empTelefono input_text" name="empTelefono" autocomplete="off" required>
        </div>
        <div class="main_div">
            <p>Correo</p>
            <input size="30" type="email" class="empCorreo input_text" name="empCorreo" autocomplete="off" required>
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
<script src="../js/jsDataSelectPaises.js"></script>
<script src="../js/jsDataSelectDepartamentos.js"></script>
<script src="../js/jsDataSelectMunicipios.js"></script>