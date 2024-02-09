//Cogemos la query
let query = window.location.search;

//Creamos la instancia
const urlParams = new URLSearchParams(query);

//Accedemos a los valores
var producto = urlParams.get('pt');

let input = document.getElementById("id").value = producto;