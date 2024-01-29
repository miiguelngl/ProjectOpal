window.onload = function(){
    document.getElementById("precio").value = "";
    document.getElementById("precio").addEventListener("blur", comprobarPrecio);
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