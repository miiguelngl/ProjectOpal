window.addEventListener("load", () =>{
    document.getElementById("descripcion").setAttribute("maxlength", 400);
    document.getElementById("telefono").addEventListener("blur", compruebaTlf);
    document.getElementById("correo").addEventListener("blur", compruebaEmail);
    document.getElementById("asunto").addEventListener("blur", compruebaAsunto);
    document.getElementById("descripcion").addEventListener("input", compruebaDescripcion);
    document.getElementById("descripcion").addEventListener("blur", borraMssgError);
});

function compruebaTlf() {
    let cmpTlf = document.getElementById("telefono");
    let tlf = cmpTlf.value;
    let num = false;

    setTimeout(() =>{
        if (tlf.length == 9 && !isNaN(parseInt(tlf))) {
            num = true;
        }else{
            num = false;
        }

        let div = document.getElementById("errorTlf");
        if (div) {
            div.remove();
        }
        
        if (!num) {
            let div = document.createElement("div");
            div.id = "errorTlf";
            cmpTlf.parentNode.insertBefore(div, cmpTlf.nextSibling);
            div.style.color = "red";
            div.innerHTML = "El numero de telefono es incorrecto";
            cmpTlf.focus();            
        }
    },0);
}

function compruebaEmail() {
    let cmpCorreo = document.getElementById("correo");
    let correo = cmpCorreo.value;
    let mssgError = document.getElementById("comprEmail")

    if (mssgError) {
        mssgError.remove();
    }

    setTimeout(()=>{
        const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!regexCorreo.test(correo)) {
            let div = document.createElement("div");
            div.id = "comprEmail";
            div.style.color = "red";
            cmpCorreo.parentNode.insertBefore(div, cmpCorreo.nextSibling);
            div.innerHTML = "El correo es incorrecto";
            cmpCorreo.focus();
        }
    },0)
}

function compruebaAsunto() {
    let cmpAsunto = document.getElementById("asunto");
    let asunto = cmpAsunto.value;
    let mssgError = document.getElementById("comprAsunto");

    if (mssgError) {
        mssgError.remove();
    }

    setTimeout(() => {
        if (asunto.length <= 0) {
            let div = document.createElement("div");
            div.id = "comprAsunto";
            div.style.color = "red";
            cmpAsunto.parentNode.insertBefore(div, cmpAsunto.nextSibling);
            div.innerHTML = "El asunto es incorrecto";
            cmpAsunto.focus();
        }
    }, 0);
}

function compruebaDescripcion() {
    let cmpDesc = document.getElementById("descripcion");
    let descripcion = cmpDesc.value;

    let mssgMostrado = document.getElementById("infoCaracteres");
    if (mssgMostrado) {
        mssgMostrado.remove();
    }
    
    if (descripcion.length < 400) {
        let div = document.createElement("div");
        div.id = "infoCaracteres";
        div.style.color = "#5B85D9";
        cmpDesc.parentNode.insertBefore(div, cmpDesc.nextSibling);
        div.innerHTML = "Puedes seguir escribiendo..."
    }else{
        let div = document.createElement("div");
        div.id = "infoCaracteres";
        div.style.color = "red";
        cmpDesc.parentNode.insertBefore(div, cmpDesc.nextSibling);
        div.innerHTML = "Has llegado al limite";
    }
}

function borraMssgError() {
    let mssgMostrado = document.getElementById("infoCaracteres");
    if (mssgMostrado) {
        mssgMostrado.remove();
    }
}