async function autocompletePaises() {
    const select = document.getElementById("dataSelect");

    try {
        const response = await fetch("/functions/api_paises.php");
        const paises = await response.json();

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

        const valorActual = registros[0].paiId;
        if (valorActual) select.value = valorActual;

    } catch (error) {
        console.error("Error cargando países:", error);
    }
}

document.addEventListener("DOMContentLoaded", autocompletePaises);