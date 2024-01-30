window.addEventListener("load", () =>{
    document.getElementById("signup").addEventListener("click", compruebaCampos);
});

let username = document.getElementById("nickname");
let name = document.getElementById("name");
let lastName = document.getElementById("subname");
let email = document.getElementById("email");
let password = document.getElementById("pass");
let cPassword = document.getElementById("re_pass");

function compruebaCampos(event) {
    if (username.value.trim() === "" || name.value.trim() === "" || lastName.value.trim() === "" ||
    email.value.trim() === "" || password.value.trim() === "" || cPassword.value.trim() === "") {
        alert("Te falta algun campo por rellenar, por favor resvisalos")
        event.preventDefault();
    }else{
        alert("Formulario enviado con exito")
    }
}