let paisesList = [];
async function autocompletePaises() {
    const select = document.getElementById("dataSelectPais");

    try {
        const response = await fetch("/functions/api_paises.php");
        const paises = await response.json();
        paisesList = paises;

        select.innerHTML = "";

        const optDefault = document.createElement("option");
        optDefault.value = "";
        optDefault.textContent = "Seleccione un país";
        select.appendChild(optDefault);

        paises.forEach(p => {
            const option = document.createElement("option");
            option.value = p.id;
            option.textContent = p.nombre;
            select.appendChild(option);
        });

        if (typeof registros !== "undefined" && registros.length > 0) {
            const valorActual = registros[0].paiId;
            if (valorActual) select.value = valorActual;
        }

    } catch (error) {
        console.error("Error cargando países:", error);
    }
}

document.addEventListener("DOMContentLoaded", autocompletePaises);