function Datos(event){
    
 

        let input = document.getElementById("buscador").value;
        let content = document.getElementById("contenido");
        let url = "./php/buscador.php";
        let formData = new FormData();
        var keycode = event.keyCode || event.which;
        let tecla = document.getElementById('tecla');
        tecla.textContent = keycode;

        formData.append('campo', input);
        formData.append('tecla', keycode);
        fetch(url, {
            method:"POST",
            body:formData,
        }).then(response => response.json())
        .then (data => {
            if(event['key'] == 'Enter'){
                location.href = './tienda.php?pt='+input;
            }
            if(data!="<li>sin resultados<li>"){
                content.style.border = "#333333 2px solid";
                content.innerHTML = '';
                if(data[0] != undefined){
                    data.forEach(item => {
                        content.innerHTML += '<li><a href="./producto.php?pt='+ item.IdZapatilla + '">' + item.Nombre + '</li>';
                    }); 
                }else{
                    content.style.border = "none";
                    content.innerHTML = '';     
                }
            }else{
                content.style.border = "none";
                content.innerHTML = '';     
            }
        }).catch(err => console.log(err))
       
}
document.getElementById("buscador").addEventListener("keydown", Datos);