<div class="grid_box main_content">
    <div class="title_bar">
        <h2>Editar Departamento</h2>
        <button type="submit" form="main_form" class="btn-agregar">Agregar</button>
    </div>
    <form action="/actualizar_departamento" class="main_form" id="main_form" method="post">
        <input type="hidden" class="depId" name="depId" value="<?php echo $resultado[0]['depId']; ?>">

        <div class="main_div">
            <p>Departamento</p>
            <input size="60" type="text" class="depDepartamento input_text" name="depDepartamento"
                   value="<?php echo $resultado[0]['depDepartamento']; ?>" required>
        </div>
        <div class="main_div">
            <p>Pais</p>
            <select class="paiPais input_text" name="paiPais" id="dataSelect" required></select>
        </div>
    </form>
</div>
<script>
    const registros = <?php echo json_encode($data); ?>;
</script>
<script src="/js/jsDataSelect.js"></script>