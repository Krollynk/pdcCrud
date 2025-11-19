<div class="grid_box main_content">
    <div class="title_bar">
        <h2>Listado de Paises</h2>
        <button type="submit" form="main_form" class="btn-agregar">Agregar</button>
    </div>
    <form action="/guardar_pais" class="main_form" id="main_form" method="post">
        <input type="hidden" class="paiId" name="paiId">

        <div class="main_div">
            <p>Pais</p>
            <input size="60" type="text" class="paiPais input_text" name="paiPais">
        </div>
        <div class="main_div">
            <p>Siglas</p>
            <input size="30" type="text" class="paiSiglas input_text" name="paiSiglas">
        </div>
    </form>
</div>