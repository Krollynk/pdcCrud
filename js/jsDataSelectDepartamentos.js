let departamentosList = [];
async function autocompleteDepartamentos() {
    const select = document.getElementById("dataSelectDepartamento");

    try {
        const response = await fetch("/functions/api_departamentos.php");
        const departamentos = await response.json();
        departamentosList = departamentos;

        select.innerHTML = "";

        const optDefault = document.createElement("option");
        optDefault.value = "";
        optDefault.textContent = "Seleccione un departamento";
        select.appendChild(optDefault);

        departamentos.forEach(p => {
            const option = document.createElement("option");
            option.value = p.id;
            option.textContent = p.nombre;
            select.appendChild(option);
        });

        if (typeof registros !== "undefined" && registros.length > 0) {
            const valorActual = registros[0].depId;
            if (valorActual) select.value = valorActual;
        }

    } catch (error) {
        console.error("Error cargando departamentos:", error);
    }
}

document.addEventListener("DOMContentLoaded", autocompleteDepartamentos);