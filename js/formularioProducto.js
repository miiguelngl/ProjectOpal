window.onload = function(){
    document.getElementById("nombre").addEventListener("blur", comprobarNombre);
    document.getElementById("precio").addEventListener("blur",comprobarPrecio);
    document.getElementById("descripcion").addEventListener("input", actualizaText);
    document.getElementById("descripcion").addEventListener("blur", quitarMensaje);
    document.getElementById("talla").addEventListener("blur", comprobarTalla);
    document.getElementById("enviar").addEventListener("click", compruebaImg);
}

function comprobarNombre() {
    let cmpNombre = document.getElementById("nombre");
    let nombre = cmpNombre.value;
    let mensajeError = document.getElementById("errorNom");
        if (mensajeError) {
            mensajeError.remove();
        }

    setTimeout(() => {                       
        if(!/^[a-z\sA-Z]+$/.test(nombre)){
        let div = document.createElement("div");
        div.id = "errorNom";         
        div.style.color = "red";
        div.textContent = "El nombre introducido es incorrecto";
        cmpNombre.parentNode.insertBefore(div, cmpNombre.nextSibling);
        cmpNombre.focus();
        };
    }, 0);
}

function comprobarPrecio(){
    let cmpPrecio = document.getElementById("precio");
    let precio = cmpPrecio.value;
    let mensajeError = document.getElementById("errorPrecio");
        if (mensajeError) {
            mensajeError.remove();
        }

    setTimeout(() => {                       
        if(isNaN(precio) || precio <= 0){
        let div = document.createElement("div");
        div.id = "errorPrecio";         
        div.style.color = "red";
        div.textContent = "El precio introducido es incorrecto";
        cmpPrecio.parentNode.insertBefore(div, cmpPrecio.nextSibling);
        cmpPrecio.focus();
        };
    }, 0);
};

function actualizaText() {
    let cmpDescripcion = document.getElementById("descripcion");
    
    var div = document.getElementById("compruebaCaract");
    if(div){
        div.remove();
    }
   
    if(cmpDescripcion.value.length < 400){
        let div = document.createElement("div");
        div.id = "compruebaCaract";
        cmpDescripcion.parentNode.insertBefore(div, cmpDescripcion.nextSibling);
        div.innerHTML = "Puedes seguir escibiendo";
        div.style.color = "#5B85D9";
    }else{
        let div = document.createElement("div");
        div.id = "compruebaCaract";
        cmpDescripcion.parentNode.insertBefore(div, cmpDescripcion.nextSibling);
        div.style.color = "red";
        div.innerHTML = "Has llegado al limite de caracteres";
    }   
    
}

function quitarMensaje() {
    let div = document.getElementById("compruebaCaract");

    if(div){
        div.remove();
    }
}

function comprobarTalla() {
    let cmpTalla = document.getElementById("talla");
    let talla = cmpTalla.value;

    let mssgError = document.getElementById("compruebaTalla")
    if(mssgError){
        mssgError.remove();
    }

    setTimeout(() => {                       
        if(isNaN(talla) || (talla < 35 || talla > 49)){
        let div = document.createElement("div");
        div.id = "compruebaTalla";         
        div.style.color = "red";
        div.textContent = "La talla introducida es incorrecta";
        cmpTalla.parentNode.insertBefore(div, cmpTalla.nextSibling);
        cmpTalla.focus();
        };
    }, 0);
}

function compruebaImg() {
    let img = document.getElementById("foto");

    if (img.files.length <= 0) {
        alert("Debe subir una imagen de sus zapatillas!!");
    }
}