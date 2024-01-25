document.addEventListener('DOMContentLoaded', function() {
    const botonMenu = document.getElementById('botonMenu');
    const menuNav = document.getElementById('header-menu-nav');

    botonMenu.addEventListener('click', (ev) => {
        ev.stopImmediatePropagation();
        menuNav.classList.toggle('mostrar-menu');
    });
    document.addEventListener('click', (event) => {
        if (!menuNav.contains(event.target) && !botonMenu.contains(event.target)) {
        menuNav.classList.remove('mostrar-menu');
        }
    });
}); 