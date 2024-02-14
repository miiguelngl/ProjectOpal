<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $nombre=$_POST["nombre"];
    $marca=$_POST["marca"];
    $desc=$_POST["descripcion"];
    $foto=$_FILES["foto"];
    $talla=$_POST["talla"];
    $precio=$_POST["precio"];
    

    //Conexion BBDD
    include("../../php/conexion.php");


    session_start();
    //Comprueba si existe sesion iniciada
    if(isset($_SESSION['Usu'])){
        $Us = $_SESSION['Usu'];
        $conexion = new mysqli($servidor, $username, $password, $base);

        //consulta para saber el IDzapatilla    
        $consulta1 = "SELECT MAX(`IdZapatilla`) FROM `Zapatillas`";
        $resultado = $conexion->query($consulta1);

        
        if ($resultado) { //Comprueba 
            $fila = $resultado->fetch_row();
            

            //consulta para saber el idUsuario
            $consulta2 = "SELECT `IdUsuario` FROM `Usuario` WHERE `Apodo` = '$Us'";
            $resultado2 = $conexion->query($consulta2);
            if($resultado2){
                echo "Valor de Precio: $precio";
                $fila2 = $resultado2->fetch_assoc();
                $idUsuario = $fila2['IdUsuario'];
                //Inserta Zapatilla a la bbdd
                $subida = "INSERT INTO `Zapatillas` (Nombre, Marca, Descripcion, Validada, Talla, Precio, IdUsuario) VALUES ('$nombre', '$marca', '$desc', 0, '$talla', '$precio', '$idUsuario')";
                $conexion->query($subida);
                $idZa = $conexion->insert_id;
                
                //Inserta Foto a la bbdd
                $contenidoImagen = file_get_contents($foto["tmp_name"]); // Lee el contenido de la imagen
                $subidaFoto = "INSERT INTO `Fotos` (IdZapatilla, Foto) VALUES ('$idZa', ?)";
                
                // Prepara la sentencia con un marcador de posición para el blob
                $stmt = $conexion->prepare($subidaFoto);
                $stmt->bind_param("s", $contenidoImagen);//s porque es mediumblob
                $stmt->execute();

                header("Location: ../confirmacionProducto.html");
            }
        }
    }else{
        header("Location: ../IniciarSesion/signIn.html");
    }
?>
    
    