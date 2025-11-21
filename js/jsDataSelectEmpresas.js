let empresasList = [];

async function autocompleteEmpresas() {
    const select = document.getElementById("dataSelectEmpresa");

    try {
        const response = await fetch("/functions/api_empresas.php");
        const empresas = await response.json();
        empresasList = empresas;

        select.innerHTML = "";

        const optDefault = document.createElement("option");
        optDefault.value = "";
        optDefault.textContent = "Seleccione una Empresa";
        select.appendChild(optDefault);

        empresas.forEach(p => {
            const option = document.createElement("option");
            option.value = p.id;
            option.textContent = p.nombre;
            select.appendChild(option);
        });

    } catch (error) {
        console.error("Error cargando empresas:", error);
    }
}

async function agregarEmpresa() {
    const empresaId = document.getElementById("dataSelectEmpresa").value;

    await fetch("/functions/api_add_empresa_colaborador.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ colId, empresaId })
    })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                cargarEmpresas();  // refresca tabla
            } else {
                alert(data.message);
            }
        });
}

async function eliminarRelacion(empId, colId) {
    await fetch("/functions/api_delete_empresa_colaborador.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ empId, colId })
    })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                cargarEmpresas(); // refresca tabla
            } else {
                alert("Error al eliminar");
            }
        });
}

async function cargarEmpresas() {
    try {
        const response = await fetch("/functions/api_empresa_colaborador.php?colId="+colId);
        const empresas = await response.json();
        registros = empresas;

        mostrarTabla(1)

    } catch (error) {
        console.error("Error cargando empresas:", error);
    }
}

document.addEventListener("DOMContentLoaded", autocompleteEmpresas);
document.addEventListener("DOMContentLoaded", cargarEmpresas);