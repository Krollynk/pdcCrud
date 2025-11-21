let municipiosList = [];
async function autocompleteMunicipios() {
    const select = document.getElementById("dataSelectMunicipio");
    try {
        const response = await fetch("/functions/api_municipios.php");
        const municipios = await response.json();
        municipiosList = municipios;

        select.innerHTML = "";

        const optDefault = document.createElement("option");
        optDefault.value = "";
        optDefault.textContent = "Seleccione un municipio";
        select.appendChild(optDefault);

        municipios.forEach(p => {
            const option = document.createElement("option");
            option.value = p.id;
            option.textContent = p.nombre;
            select.appendChild(option);
        });

        if (typeof registros !== "undefined" && registros.length > 0) {
            const valorActual = registros[0].munId;
            if (valorActual) select.value = valorActual;
        }

    } catch (error) {
        console.error("Error cargando municipios:", error);
    }
}

document.addEventListener("DOMContentLoaded", autocompleteMunicipios);

document.getElementById("dataSelectMunicipio").addEventListener("change", function () {
    const municipioId = this.value;

    const municipio = municipiosList.find(m => m.id === municipioId);

    if (!municipio){
        document.getElementById("dataSelectDepartamento").value = "";
        document.getElementById("dataSelectPais").value = "";
        return;
    }

    const depId = municipio.depId;
    const paiId = municipio.paiId;

    document.getElementById("dataSelectDepartamento").value = depId;
    document.getElementById("dataSelectPais").value = paiId;
});

document.getElementById("dataSelectDepartamento").addEventListener("change", function () {
    const departamentoId = this.value;

    const departamento = departamentosList.find(m => m.id === departamentoId);

    if (!departamento){
        document.getElementById("dataSelectMunicipio").value = "";
        document.getElementById("dataSelectPais").value = "";
        return;
    }

    const paiId = departamento.paiId;

    document.getElementById("dataSelectMunicipio").value = "";
    document.getElementById("dataSelectPais").value = paiId;
});