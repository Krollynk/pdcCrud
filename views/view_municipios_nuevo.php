<div class="grid_box main_content">
    <div class="title_bar">
        <h2>Agregar Municipio</h2>
        <button type="submit" form="main_form" class="btn-agregar">Agregar</button>
    </div>
    <form action="/guardar_municipio" class="main_form" id="main_form" method="post">
        <input type="hidden" class="munId" name="munId">

        <div class="main_div">
            <p>Municipio</p>
            <input size="60" type="text" class="munMunicipio input_text" name="munMunicipio" autocomplete="off" required>
        </div>
        <div class="main_div">
            <p>Departamento</p>
            <select class="depDepartamento input_text" name="depDepartamento" id="dataSelectDepartamento" required></select>
        </div>
    </form>
</div>
<script src="../js/jsDataSelectDepartamentos.js"></script>