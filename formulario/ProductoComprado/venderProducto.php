<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $id=$_POST["id"];
    $nombreCliente = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $cp = $_POST["cp"];

    //Conexion BBDD
    include("../../php/conexion.php");


    session_start();
    //Comprueba si existe sesion iniciada
    if(isset($_SESSION['Usu'])){
        $us = $_SESSION['Usu'];


        $consultaUsuario = "SELECT * FROM `Usuario` WHERE `Apodo` = ?";
        $stmt = $conexion->prepare($consultaUsuario);
        $stmt->bind_param("s", $us);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if($resultado){
            $array = $resultado->fetch_assoc();
            $nombre = $array['Nombre'];
            $correo = $array['Correo'];
        }

        if($conexion) {
            $consulta1 = "DELETE FROM `Fotos` WHERE `IdZapatilla` = ?";
            $stmt = $conexion->prepare($consulta1);
            $stmt->bind_param("s", $id);
            $stmt->execute();
        
            $consulta2 = "DELETE FROM `Zapatillas` WHERE IdZapatilla = ?";
            $stmt = $conexion->prepare($consulta2);
            $stmt->bind_param("s", $id);
            $stmt->execute();

            enviarMail($nombre, $correo, $nombreCliente, $direccion, $cp);

            header("Location: ../confirmacionCompra.html");
        }
    }else{
        header("Location: ../IniciarSesion/signIn.html");
    }


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    function enviarMail($nombre, $correo, $nombreCliente, $direccion, $cp){
        //Carga de las clases necesarias
        require '../../mail/PHPMailer/src/Exception.php';
        require '../../mail/PHPMailer/src/PHPMailer.php';
        require '../../mail/PHPMailer/src/SMTP.php';
    
        //Crear una instancia. Con true permitimos excepciones
        $mail = new PHPMailer(true);
    
        try {
            //Valores dependientes del servidor que utilizamos
            $mail->isSMTP();                                           //Para usaar SMTP
            $mail->Host       = 'smtp-mail.outlook.com';                     //Nuestro servidor SMTMP smtp.gmail.com en caso de usar gmail
            $mail->SMTPAuth   = true;    
            $mail->Username   = 'opalservice@outlook.es';             
            $mail->Password   = 'hmqmvhzqifmwjvls';    
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            //Remitente
            $mail->setFrom('opalservice@outlook.es', 'Opal');
            //Receptores. Podemos añadir más de uno. El segundo argumento es opcional, es el nombre
            $mail->addAddress($correo, $nombre);     //Add a recipient
            //Contenido
            //Si enviamos HTML
            $mail->isHTML(true);    
            $mail->CharSet = "UTF8";    
            //Asunto
            $mail->Subject = 'Compra realizada';
            //Conteido HTML
            $mail->Body    = '<h3>¡Hola '. $nombre .', tu compra ha sido realizada correctamente!</h3><h4>Tu pedido será entregado por el vendedor lo antes posible.<br>Gracias por confiar en Opal.</h4><h4>Datos de la entrega</h4><p>Comprador: '. $nombreCliente .'<br>Dirección: '. $direccion .'<br>Código postal: '. $cp .'</p>';
            //Contenido alternativo en texto simple
            $mail->AltBody = '¡Hola '. $nombre .', tu compra ha sido realizada correctamente! Tu pedido será entregado por el vendedor lo antes posible.<br>Gracias por confiar en Opal.';
            //Enviar correo
            $mail->send();
            echo 'El mensaje se ha enviado con exito';
        } catch (Exception $e) {
            echo "El mensaje no se ha enviado: {$mail->ErrorInfo}";
            
        }
    }
?>
    
    