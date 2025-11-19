console.log(vista);
let sinRegistros = false;
if(registros === null){
    sinRegistros = true;
}
let idSeleccionado = null;
let paginaActual = 1;
const registrosPorPagina = 20;
const tabla = document.getElementById('main_table').getElementsByTagName('tbody')[0];
const btnAnterior = document.getElementById('btnAnterior');
const btnSiguiente = document.getElementById('btnSiguiente');

function viewPaises(registrosPagina){
    registrosPagina.forEach(registro => {
        const fila = tabla.insertRow();
        fila.id = registro.paiId;
        const celdaPais = fila.insertCell();
        const celdaSiglas = fila.insertCell();
        const celdaAcciones = fila.insertCell();

        const btnEditar = document.createElement('a');
        const btnEliminar = document.createElement('a');

        btnEditar.textContent = "Editar";
        btnEliminar.textContent = "Eliminar";

        btnEditar.href = "/view_paises_editar?id=" + registro.paiId;
        btnEliminar.href = "/view_paises_eliminar?id=" + registro.paiId;

        btnEditar.classList.add("btn_editar");
        btnEliminar.classList.add("btn_eliminar");

        celdaPais.textContent = registro.paiPais;
        celdaSiglas.textContent = registro.paiSiglas;

        celdaAcciones.appendChild(btnEditar);
        celdaAcciones.appendChild(btnEliminar);
    });
}

function mostrarTabla(pagina) {
    tabla.innerHTML = ''; // Limpiar la tabla
    const inicio = (pagina - 1) * registrosPorPagina;
    const fin = inicio + registrosPorPagina;
    const registrosPagina = registros.slice(inicio, fin);

    if(window.location.pathname === '/view_paises'){
        viewPaises(registrosPagina);
    }
}

function actualizarBotones() {
    btnAnterior.disabled = paginaActual === 1;
    btnSiguiente.disabled = paginaActual * registrosPorPagina >= registros.length;
}

btnAnterior.addEventListener('click', () => {
    if (paginaActual > 1) {
        paginaActual--;
        mostrarTabla(paginaActual);
        actualizarBotones();
    }
});

btnSiguiente.addEventListener('click', () => {
    if (paginaActual * registrosPorPagina < registros.length) {
        paginaActual++;
        mostrarTabla(paginaActual);
        actualizarBotones();
    }
});

// Inicializar funciones
if(!sinRegistros){
    mostrarTabla(paginaActual);
    actualizarBotones();
}