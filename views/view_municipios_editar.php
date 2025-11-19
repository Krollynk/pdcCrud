<div class="grid_box main_content">
    <div class="title_bar">
        <h2>Editar Municipio</h2>
        <button type="submit" form="main_form" class="btn-agregar">Agregar</button>
    </div>
    <form action="/actualizar_municipio" class="main_form" id="main_form" method="post">
        <input type="hidden" class="munId" name="munId" value="<?php echo $resultado[0]['munId']; ?>">

        <div class="main_div">
            <p>Departamento</p>
            <input size="60" type="text" class="munMunicipio input_text" name="munMunicipio"
                   value="<?php echo $resultado[0]['munMunicipio']; ?>" required>
        </div>
        <div class="main_div">
            <p>Pais</p>
            <select class="depDepartamento input_text" name="depDepartamento" id="dataSelectDepartamento" required></select>
        </div>
    </form>
</div>
<script>
    const registros = <?php echo json_encode($data); ?>;
</script>
<script src="../js/jsDataSelectDepartamentos.js"></script>