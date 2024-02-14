window.addEventListener("load", () => {
    const descripcionInput = document.getElementById("descripcion");
    descripcionInput.setAttribute("maxlength", 200);
    descripcionInput.addEventListener("input", compruebaDescripcion);
    descripcionInput.addEventListener("blur", borraMssgError);
    descripcionInput.addEventListener("focus", borraMssgError);

    document.getElementById("telefono").addEventListener("blur", compruebaTlf);
    document.getElementById("telefono").addEventListener("input", borraMssgError); 
    document.getElementById("correo").addEventListener("blur", compruebaEmail);
    document.getElementById("correo").addEventListener("input", borraMssgError);
    document.getElementById("asunto").addEventListener("blur", compruebaAsunto);
    document.getElementById("asunto").addEventListener("input", borraMssgError);
});

function mostrarMensajeError(elemento, mensaje) {
    const mssgError = document.getElementById(`compr${elemento}`);
    if (mssgError) {
        mssgError.remove();
    }

    if (mensaje) {
        elemento.insertAdjacentHTML('afterend', `<div id="compr${elemento}" style="color: red">${mensaje}</div>`);
        elemento.focus();
    }
}

function compruebaTlf() {
    const cmpTlf = document.getElementById("telefono");
    const tlf = cmpTlf.value.trim();

    const div = document.getElementById("errorTlf");
    if (div) {
        div.remove();
    }

    if (tlf.length !== 9 || isNaN(Number(tlf))) {
        mostrarMensajeError(cmpTlf, "El número de teléfono es iválido");
    }else{
        mostrarMensajeError(cmpTlf, "");
    }
}

function compruebaEmail() {
    const cmpCorreo = document.getElementById("correo");
    const correo = cmpCorreo.value;

    const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!regexCorreo.test(correo)) {
        mostrarMensajeError(cmpCorreo, "El correo es incorrecto");
    }else{
        mostrarMensajeError(cmpCorreo, "");
    }
}

function compruebaAsunto() {
    const cmpAsunto = document.getElementById("asunto");
    const asunto = cmpAsunto.value;

    if (asunto.length <= 0) {
        mostrarMensajeError(cmpAsunto, "El asunto es incorrecto");
    }
}

function compruebaDescripcion() {
    const cmpDesc = document.getElementById("descripcion");
    const descripcion = cmpDesc.value;

    const mssgMostrado = document.getElementById("infoCaracteres");
    if (mssgMostrado) {
        mssgMostrado.remove();
    }

    if (descripcion.length < 200) {
       mostrarMensajeError(cmpDesc, "");
    } else {
        mostrarMensajeError(cmpDesc, "Has llegado al límite");
    }
}

function borraMssgError() {
    const mssgMostrado = document.getElementById("infoCaracteres");
    if (mssgMostrado) {
        mssgMostrado.remove();
    }
}
let enviar = document.getElementById('enviar');

enviar.addEventListener("onclick", function(){
    enviar.disabled = true;
});