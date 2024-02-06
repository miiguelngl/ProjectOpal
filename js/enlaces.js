let a = document.querySelectorAll("main .card");

a.forEach(element => {
    let img = element.getElementsByTagName("img")[0];
    let h5 = element.getElementsByTagName("h5")[0];
    let button = element.getElementsByTagName("a")[0];

    let e = element.querySelector(".card-text");
    let t = e.getAttribute("e");

    img.onclick = function () {
        window.location.href = "./producto.php?pt=" + encodeURIComponent(t);
    }
    h5.onclick = function () {
        window.location.href = "./producto.php?pt=" + encodeURIComponent(t);
    }
    button.onclick = function () {
        window.location.href = "./checkOut.php?pt=" + encodeURIComponent(t);
    }
});

