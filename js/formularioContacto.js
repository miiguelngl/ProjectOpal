window.addEventListener("load", () =>{
    document.getElementById("telefono").value = "";
    document.getElementById("telefono").addEventListener("blur", compruebaTlf);    
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
        
        if (!num) {
            alert("Has introducido mal el numero");
            cmpTlf.focus();
        }
    },0);
}