<div class="grid_box main_content">
    <div class="title_bar">
        <h2>Agregar Colaborador</h2>
        <button type="submit" form="main_form" class="btn-agregar">Agregar</button>
    </div>
    <form action="/guardar_colaborador" class="main_form" id="main_form" method="post">
        <input type="hidden" class="colId" name="colId">

        <div class="main_div">
            <p>Nombre</p>
            <input size="60" type="text" class="colNombre input_text" name="colNombre" autocomplete="off" required>
        </div>
        <div class="main_div">
            <p>Apellido</p>
            <input size="60" type="text" class="colApellido input_text" name="colApellido" autocomplete="off" required>
        </div>
        <div class="main_div">
            <p>Edad</p>
            <input size="30" type="text" class="colEdad input_text" name="colEdad" autocomplete="off" required>
        </div>
        <div class="main_div">
            <p>Teléfono</p>
            <input size="30" type="text" class="colTelefono input_text" name="colTelefono" autocomplete="off" required>
        </div>
        <div class="main_div">
            <p>Correo</p>
            <input size="30" type="email" class="colCorreo input_text" name="colCorreo" autocomplete="off" required>
        </div>
    </form>
</div>