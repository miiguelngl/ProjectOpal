window.onload = function(){
    document.forms["fProducto"].elements["precio"].onclick = comprobarPrecio();
}

function comprobarPrecio(){
    var precio = document.forms["fProducto"].elements["precio"].value;
    if(precio < 0){
        console.log("Precio erroneo");
    }
}