let a = document.querySelectorAll("main .card");

a.forEach(element => {
    let e = element.querySelector(".card-text");
    let t = e.getAttribute("e");
    element.onclick = function () {
        window.location.href = "./producto.php?pt=" + encodeURIComponent(t);
    }
});

