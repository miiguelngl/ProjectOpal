document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("nombre").addEventListener("blur", validarNombre);
    document.getElementById("precio").addEventListener("blur", validarPrecio);
    document.getElementById("descripcion").addEventListener("input", actualizarTexto);
    document.getElementById("descripcion").addEventListener("blur", quitarMensaje);
    document.getElementById("talla").addEventListener("blur", validarTalla);
    document.getElementById("enviar").addEventListener("click", validarImagen);
});

function validarNombre() {
    let cmpNombre = document.getElementById("nombre");
    let nombre = cmpNombre.value;
    let mensajeError = document.getElementById("errorNom");

    if (mensajeError) {
        mensajeError.remove();
    }
    console.log(/^[a-zA-Z][a-zA-Z0-9\s]*$/.test(nombre))
    if (/^[a-zA-Z][a-zA-Z0-9\s]*$/.test(nombre) == false){
        let div = crearMensajeError("errorNom", "El nombre introducido no es válido", cmpNombre);
        cmpNombre.parentNode.insertBefore(div, cmpNombre.nextSibling);
        cmpNombre.focus();
    }
}

function validarPrecio() {
    let cmpPrecio = document.getElementById("precio");
    let precio = cmpPrecio.value;
    let mensajeError = document.getElementById("errorPrecio");

    if (mensajeError) {
        mensajeError.remove();
    }

    if (isNaN(precio) || precio <= 0) {
        let div = crearMensajeError("errorPrecio", "El precio introducido no es válido", cmpPrecio);
        cmpPrecio.parentNode.insertBefore(div, cmpPrecio.nextSibling);
        cmpPrecio.focus();
    }
}

function actualizarTexto() {
    let cmpDescripcion = document.getElementById("descripcion");
    let div = document.getElementById("compruebaCaract");

    if (div) {
        div.remove();
    }

    if (cmpDescripcion.value.length < 200) {
        div = crearMensajeInformativo("compruebaCaract", "", "#5B85D9", cmpDescripcion);
    } else {
        div = crearMensajeInformativo("compruebaCaract", "Has llegado al límite de caracteres", "red", cmpDescripcion);
    }

    cmpDescripcion.parentNode.insertBefore(div, cmpDescripcion.nextSibling);
}

function quitarMensaje() {
    let div = document.getElementById("compruebaCaract");

    if (div) {
        div.remove();
    }
}

function validarTalla() {
    let cmpTalla = document.getElementById("talla");
    let talla = cmpTalla.value;
    let mensajeError = document.getElementById("compruebaTalla");

    if (mensajeError) {
        mensajeError.remove();
    }

    if (isNaN(talla) || (talla < 35 || talla > 49)) {
        let div = crearMensajeError("compruebaTalla", "La talla introducida no es válida", cmpTalla);
        cmpTalla.parentNode.insertBefore(div, cmpTalla.nextSibling);
        cmpTalla.focus();
    }
}

function validarImagen() {
    let img = document.getElementById("foto");

    if (img.files.length <= 0) {
        alert("Debe subir una imagen de sus zapatillas!!");
    }
}

function crearMensajeError(id, mensaje, elementoRelacionado) {
    let div = document.createElement("div");
    div.id = id;
    div.style.color = "red";
    div.textContent = mensaje;
    return div;
}

function crearMensajeInformativo(id, mensaje, color, elementoRelacionado) {
    let div = document.createElement("div");
    div.id = id;
    div.style.color = color;
    div.innerHTML = mensaje;
    return div;
}
