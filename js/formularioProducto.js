window.onload = function(){
    document.getElementById("precio").value = "";
    document.getElementById("precio").addEventListener("blur", comprobarPrecio);
}

function comprobarPrecio(){
    let cmpPrecio = document.getElementById("precio");
    let precio = cmpPrecio.value;
    setTimeout(() => {
        if(isNaN(precio) || precio <= 0){
        alert("Precio erroneo, debes introducir un numero positivo");
        cmpPrecio.focus();
        };
    }, 0);
};