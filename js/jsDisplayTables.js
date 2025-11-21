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
        btnEliminar.href = "/paises_eliminar?id=" + registro.paiId;

        btnEditar.classList.add("btn_editar");
        btnEliminar.classList.add("btn_eliminar");

        celdaPais.textContent = registro.paiPais;
        celdaSiglas.textContent = registro.paiSiglas;

        celdaAcciones.appendChild(btnEditar);
        celdaAcciones.appendChild(btnEliminar);
    });
}

function viewDepartamentos(registrosPagina){
    registrosPagina.forEach(registro => {
        const fila = tabla.insertRow();
        fila.id = registro.depId;
        const celdaDepartamento = fila.insertCell();
        const celdaPais = fila.insertCell();
        const celdaAcciones = fila.insertCell();

        const btnEditar = document.createElement('a');
        const btnEliminar = document.createElement('a');

        btnEditar.textContent = "Editar";
        btnEliminar.textContent = "Eliminar";

        btnEditar.href = "/view_departamentos_editar?id=" + registro.depId;
        btnEliminar.href = "/departamentos_eliminar?id=" + registro.depId;

        btnEditar.classList.add("btn_editar");
        btnEliminar.classList.add("btn_eliminar");


        celdaDepartamento.textContent = registro.depDepartamento;
        celdaPais.textContent = registro.paiPais;

        celdaAcciones.appendChild(btnEditar);
        celdaAcciones.appendChild(btnEliminar);
    });
}

function viewMunicipios(registrosPagina){
    registrosPagina.forEach(registro => {
        const fila = tabla.insertRow();
        fila.id = registro.munId;
        const celdaMunicipio = fila.insertCell();
        const celdaDepartamento = fila.insertCell();
        const celdaPais = fila.insertCell();
        const celdaAcciones = fila.insertCell();

        const btnEditar = document.createElement('a');
        const btnEliminar = document.createElement('a');

        btnEditar.textContent = "Editar";
        btnEliminar.textContent = "Eliminar";

        btnEditar.href = "/view_municipios_editar?id=" + registro.munId;
        btnEliminar.href = "/municipios_eliminar?id=" + registro.munId;

        btnEditar.classList.add("btn_editar");
        btnEliminar.classList.add("btn_eliminar");

        celdaMunicipio.textContent = registro.munMunicipio;
        celdaDepartamento.textContent = registro.depDepartamento;
        celdaPais.textContent = registro.paiPais;

        celdaAcciones.appendChild(btnEditar);
        celdaAcciones.appendChild(btnEliminar);
    });
}

function viewEmpresas(registrosPagina){
    registrosPagina.forEach(registro => {
        const fila = tabla.insertRow();
        fila.id = registro.empId;
        const celdaRazon = fila.insertCell();
        const celdaCorreo = fila.insertCell();
        const celdaMunicipio = fila.insertCell();
        const celdaPais = fila.insertCell();
        const celdaAcciones = fila.insertCell();

        const btnVer = document.createElement('a');
        const btnEditar = document.createElement('a');
        const btnEliminar = document.createElement('a');

        btnVer.textContent = "Ver";
        btnEditar.textContent = "Editar";
        btnEliminar.textContent = "Eliminar";

        btnVer.href = "/view_empresas_ver?id=" + registro.empId;
        btnEditar.href = "/view_empresas_editar?id=" + registro.empId;
        btnEliminar.href = "/empresas_eliminar?id=" + registro.empId;

        btnVer.classList.add("btn_editar");
        btnEditar.classList.add("btn_editar");
        btnEliminar.classList.add("btn_eliminar");

        celdaRazon.textContent = registro.empRazonSocial;
        celdaCorreo.textContent = registro.empCorreo;
        celdaMunicipio.textContent = registro.munMunicipio;
        celdaPais.textContent = registro.paiPais;

        celdaAcciones.appendChild(btnVer);
        celdaAcciones.appendChild(btnEditar);
        celdaAcciones.appendChild(btnEliminar);
    });
}

function viewColaboradores(registrosPagina){
    registrosPagina.forEach(registro => {
        const fila = tabla.insertRow();
        fila.id = registro.colId;
        const celdaNombre = fila.insertCell();
        const celdaTelefono = fila.insertCell();
        const celdaCorreo = fila.insertCell();
        const celdaAcciones = fila.insertCell();

        const btnVer = document.createElement('a');
        const btnEditar = document.createElement('a');
        const btnEliminar = document.createElement('a');

        btnVer.textContent = "Ver";
        btnEditar.textContent = "Editar";
        btnEliminar.textContent = "Eliminar";

        btnVer.href = "/view_colaboradores_ver?id=" + registro.colId;
        btnEditar.href = "/view_colaboradores_editar?id=" + registro.colId;
        btnEliminar.href = "/colaboradores_eliminar?id=" + registro.colId;

        btnVer.classList.add("btn_editar");
        btnEditar.classList.add("btn_editar");
        btnEliminar.classList.add("btn_eliminar");

        celdaNombre.textContent = registro.colNombre + " " + registro.colApellido;
        celdaTelefono.textContent = registro.colTelefono;
        celdaCorreo.textContent = registro.colCorreo;

        celdaAcciones.appendChild(btnVer);
        celdaAcciones.appendChild(btnEditar);
        celdaAcciones.appendChild(btnEliminar);
    });
}

function viewEmpresasAsociadas(registrosPagina){
    registrosPagina.forEach(registro => {
        const fila = tabla.insertRow();
        fila.id = registro.empId;
        const celdaNombre = fila.insertCell();
        const celdaCorreo = fila.insertCell();
        const celdaTelefono = fila.insertCell();
        const celdaAcciones = fila.insertCell();

        const btnEliminar = document.createElement('button');

        btnEliminar.textContent = "Eliminar";
        btnEliminar.classList.add("btn_eliminar");
        btnEliminar.onclick = () => eliminarRelacion(registro.empId, colId);

        celdaNombre.textContent = registro.empNombreComercial;
        celdaCorreo.textContent = registro.empCorreo;
        celdaTelefono.textContent = registro.empTelefono;

        celdaAcciones.appendChild(btnEliminar);
    });
}

function viewEmpresasAsociadasVer(registrosPagina){
    registrosPagina.forEach(registro => {
        const fila = tabla.insertRow();
        fila.id = registro.empId;
        const celdaNombre = fila.insertCell();
        const celdaRazon = fila.insertCell();
        const celdaNit = fila.insertCell();
        const celdaCorreo = fila.insertCell();
        const celdaTelefono = fila.insertCell();

        celdaNombre.textContent = registro.empNombreComercial;
        celdaRazon.textContent = registro.empRazonSocial;
        celdaNit.textContent = registro.empNit;
        celdaCorreo.textContent = registro.empCorreo;
        celdaTelefono.textContent = registro.empTelefono;

    });
}

function viewColaboradoresAsociadosVer(registrosPagina){
    registrosPagina.forEach(registro => {
        const fila = tabla.insertRow();
        fila.id = registro.empId;
        const celdaNombre = fila.insertCell();
        const celdaApellido = fila.insertCell();
        const celdaEdad = fila.insertCell();
        const celdaCorreo = fila.insertCell();
        const celdaTelefono = fila.insertCell();

        celdaNombre.textContent = registro.colNombre;
        celdaApellido.textContent = registro.colApellido;
        celdaEdad.textContent = registro.colEdad;
        celdaCorreo.textContent = registro.colCorreo;
        celdaTelefono.textContent = registro.colTelefono;

    });
}

function mostrarTabla(pagina) {
    tabla.innerHTML = ''; // Limpiar la tabla
    const inicio = (pagina - 1) * registrosPorPagina;
    const fin = inicio + registrosPorPagina;
    const registrosPagina = registros.slice(inicio, fin);

    if(window.location.pathname === '/view_paises' || window.location.pathname === '/'){
        viewPaises(registrosPagina);
    }else if(window.location.pathname === '/view_departamentos'){
        viewDepartamentos(registrosPagina);
    }else if(window.location.pathname === '/view_municipios'){
        viewMunicipios(registrosPagina);
    }else if(window.location.pathname === '/view_empresas'){
        viewEmpresas(registrosPagina);
    }else if(window.location.pathname === '/view_colaboradores'){
        viewColaboradores(registrosPagina);
    }else if(window.location.pathname === '/view_colaboradores_editar'){
        viewEmpresasAsociadas(registrosPagina);
    }else if(window.location.pathname === '/view_colaboradores_ver'){
        viewEmpresasAsociadasVer(registrosPagina);
    }else if(window.location.pathname === '/view_empresas_ver'){
        viewColaboradoresAsociadosVer(registrosPagina);
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