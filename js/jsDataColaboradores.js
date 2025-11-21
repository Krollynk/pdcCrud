async function cargarColaboradores() {
    try {
        const response = await fetch("/functions/api_colaborador_empresa.php?empId="+empId);
        const colaboradores = await response.json();
        registros = colaboradores;

        mostrarTabla(1)

    } catch (error) {
        console.error("Error cargando empresas:", error);
    }
}

document.addEventListener("DOMContentLoaded", cargarColaboradores);