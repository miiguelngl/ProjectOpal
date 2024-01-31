    window.addEventListener("load", () =>{
        document.getElementById("signup").addEventListener("click", compruebaCampos);
    });

    let username = document.getElementById("nickname");
    let name = document.getElementById("name");
    let lastName = document.getElementById("subname");
    let email = document.getElementById("email");
    let password = document.getElementById("pass");
    let cPassword = document.getElementById("re_pass");
    let checkbox = document.getElementById("agree-term"); 

    function compruebaCampos(event) {
        let usernameValido = compruebaUsername();
        let nombreValido = compruebaNombre();
        let apellidoValido = compruebaApellido();
        let emailValido = compruebaEmail();
        let contraseñaValida = compruebaContraseña();
        let box = compruebaBox();

        if (!usernameValido || !nombreValido || !apellidoValido || !emailValido || !contraseñaValida || !box || 
            name.value.trim() === "" || lastName.value.trim() === "" || email.value.trim() === "" || 
            password.value.trim() === "" || cPassword.value.trim() === "") {
            alert("Revisa los campos resaltados en rojo antes de enviar el formulario");
            event.preventDefault();
        } else {
            alert("Formulario enviado con éxito");
        }
    }
    function compruebaUsername() {
        username.style.borderBottom = "2px #5B85D9 solid";

        if (username.value.length === 0) {
            username.style.borderBottom = "2px red solid";
            return false;      
        }
        return true;
    }

    function compruebaNombre() {
        let nameVal = name.value;
        name.style.borderBottom = "2px #5B85D9 solid";

        if (!/^[a-z\sA-Z]+$/.test(nameVal)) {
            name.style.borderBottom = "2px red solid";
            return false;
        }
        return true;
    }

    function compruebaApellido() {
        let lastNameVal = lastName.value;
        lastName.style.borderBottom = "2px #5B85D9 solid";

        if (!/^[a-z\sA-Z]+$/.test(lastNameVal)) {
            lastName.style.borderBottom = "2px red solid";
            return false;      
        }
        return true;
    }

    function compruebaEmail(){
        let emailVal = email.value;
        const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        email.style.borderBottom = "2px #5B85D9 solid";

        if (!regexCorreo.test(emailVal)) {
            email.style.borderBottom = "2px red solid";
            return false;
        }
        return true;
    }

    function compruebaContraseña() {
        password.style.borderBottom = "2px #5B85D9 solid";
        cPassword.style.borderBottom = "2px #5B85D9 solid";
        
        if(password.value != cPassword.value || password.value.length === 0 || cPassword.value.length === 0){
            password.style.borderBottom = "2px red solid";
            cPassword.style.borderBottom = "2px red solid";
            return false;
        }
        return true;
    }

    function compruebaBox() {
        let terminos = document.getElementById("terminos");
        let aHref = document.querySelector(".term-service");
        terminos.style.color = "black";
        aHref.style.color = "#809BBF";

        if (!checkbox.checked) {
            terminos.style.color = "red";
            aHref.style.color = "red";
            return false;
        }

        return true;
    }
