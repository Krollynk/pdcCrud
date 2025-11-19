async function autocompleteDepartamentos() {
    const select = document.getElementById("dataSelectDepartamento");

    try {
        const response = await fetch("/functions/api_departamentos.php");
        const paises = await response.json();

        select.innerHTML = "";

        const optDefault = document.createElement("option");
        optDefault.value = "";
        optDefault.textContent = "Seleccione un departamento";
        select.appendChild(optDefault);

        paises.forEach(p => {
            const option = document.createElement("option");
            option.value = p.id;
            option.textContent = p.nombre;
            select.appendChild(option);
        });

        const valorActual = registros[0].depId;
        if (valorActual) select.value = valorActual;

    } catch (error) {
        console.error("Error cargando países:", error);
    }
}

document.addEventListener("DOMContentLoaded", autocompleteDepartamentos);