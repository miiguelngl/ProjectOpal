

document.getElementById("login-form").addEventListener("submit", function(event) {
    // Obtener los valores de los campos
    var pass = document.getElementById("pass").value;
    var rePass = document.getElementById("re_pass").value;

    // Validar la longitud mínima
    if (pass.length < 4) {
        alert("La contraseña debe tener al menos 4 caracteres.");
        event.preventDefault(); // Evitar que el formulario se envíe
        return;
    }

    // Validar que las contraseñas coincidan
    if (pass !== rePass) {
        alert("Las contraseñas no coinciden.");
        event.preventDefault(); // Evitar que el formulario se envíe
        return;
    }
});