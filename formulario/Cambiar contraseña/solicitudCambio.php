<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $email=$_POST["email"];

    //Conexion BBDD
    include ("../../php/conexion.php");

    $consultaUsuario = "SELECT * FROM `Usuario` WHERE `Correo` = ?";
    $stmt = $conexion->prepare($consultaUsuario);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if($resultado){
        $array = $resultado->fetch_assoc();
        $nombre = $array['Nombre'];
        $id = $array['IdUsuario'];
        enviarMail($email, $nombre, $id);
        header("Location: confirmacionSolicitudCambioContraseña.html");
    }else{
        echo'El correo '. $email .' no existe en nuestra base de datos';
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    function enviarMail($correo, $nombre, $id){
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
            $mail->Subject = 'Solicitud cambio contraseña';
            //Conteido HTML
            $mail->Body    = '<h3>Hola '. $nombre .' solicitaste un cambio de contraseña</h3><h4><a href="http://' . $_SERVER['HTTP_HOST'] . '/formulario/Cambiar%20contraseña/cambiarContraseña.php?id='. $id .'">Cambiar contraseña</a></h4>';
            //Contenido alternativo en texto simple
            $mail->AltBody = '';
            //Enviar correo
            $mail->send();
            echo 'El mensaje se ha enviado con exito';
        } catch (Exception $e) {
            echo "El mensaje no se ha enviado: {$mail->ErrorInfo}";
            
        }
    }
?>
    
    