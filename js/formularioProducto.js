window.onload = function(){
    document.getElementById("precio").addEventListener("blur",comprobarPrecio);
    document.getElementById("descripcion").addEventListener("input", actualizaText);
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
    
    let div = document.getElementById("compruebaCaract");
    if(div){
        div.remove();
    } 

    if(cmpDescripcion.value.length < 400){
        let div = document.createElement("div");
        div.id = "compruebaCaract";
        cmpDescripcion.parentNode.insertBefore(div, cmpDescripcion.nextSibling);
        div.innerHTML = "Puedes seguir escibiendo";
    }else{
        let div = document.createElement("div");
        div.id = "compruebaCaract";
        cmpDescripcion.parentNode.insertBefore(div, cmpDescripcion.nextSibling);
        div.innerHTML = "No puedes escribir mas";
    }
}