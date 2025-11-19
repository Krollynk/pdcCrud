<div class="grid_box main_content">
    <div class="title_bar">
        <h2>Agregar Departamento</h2>
        <button type="submit" form="main_form" class="btn-agregar">Agregar</button>
    </div>
    <form action="/guardar_departamento" class="main_form" id="main_form" method="post">
        <input type="hidden" class="depId" name="depId">

        <div class="main_div">
            <p>Departamento</p>
            <input size="60" type="text" class="depDepartamento input_text" name="depDepartamento" autocomplete="off" required>
        </div>
        <div class="main_div">
            <p>Siglas</p>
            <select class="paiPais input_text" name="paiPais" id="dataSelect" required></select>
        </div>
    </form>
</div>
<script src="../js/jsDataSelectPaises.js"></script>