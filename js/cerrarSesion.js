document.getElementById("cerrar").addEventListener("click", function(e) {
    e.preventDefault(); // Evitar que el enlace redireccione directamente

    // Realizar una solicitud al servidor para eliminar la sesión
    // Puedes usar Fetch API o XMLHttpRequest para enviar una solicitud al servidor PHP

    // Por ejemplo, con Fetch API:
    fetch('./php/cerrarSesion.php', {
        method: 'GET'
    })
    .then(response => {
        // Redirigir al usuario después de que se elimine la sesión
        window.location.href = "./index.php";
    })
    .catch(error => {
        console.error('Error al realizar la solicitud:', error);
    });
});