function Datos(){
    let input = document.getElementById("buscador").value;
    let content = document.getElementById("contenido");
    let url = "./php/buscador.php";
    let formData = new FormData();

    formData.append('campo', input);

    fetch(url, {
        method:"POST",
        body:formData,
    }).then(response => response.json())
    .then (data => {
        if(data!="<li>sin resultados<li>"){
            content.style.border = "#333333 2px solid";
            content.innerHTML = '';
            if(data[0] != undefined){
                data.forEach(item => {
                    content.innerHTML += '<li>' + item.Nombre + '</li>';
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
Datos();

document.getElementById("buscador").addEventListener("keyup", Datos);