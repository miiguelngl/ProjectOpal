let button = document.getElementsByClassName("card-button")[0];

//Cogemos la query
let query = window.location.search;

//Creamos la instancia
const urlParams = new URLSearchParams(query);

//Accedemos a los valores
var producto = urlParams.get('pt');

button.onclick = function () {
    window.location.href = "./checkOut.php?pt=" + encodeURIComponent(producto);
}

