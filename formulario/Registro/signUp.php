<?php
//Inicia sesion
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

//Mostrar errores 

//Si el método es POST entonces recoge los datos
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    //Recoge datos form
    $usuario = $_POST["nickname"];
    $nombre = $_POST["name"];
    $apellidos = $_POST["subname"];
    $email = $_POST["email"];
    $contrasena = password_hash($_POST["pass"], PASSWORD_DEFAULT);
    
    include '../../php/conexion.php';

    

    //Comprobaciones antes de enviar datos
    //Comprueba que el USERNAME no exista en la BBDD;
    $comprobacionUsu = "SELECT * FROM `Usuario` WHERE `Apodo` = '$usuario'";
    $resultadoUsu = $conexion->query($comprobacionUsu);
    
    //Comprueba que el CORREO no exista en la BBDD;
    $comprobacionEmail = "SELECT * FROM `Usuario` WHERE `Correo` = '$email'";
    $resultadoEmail = $conexion->query($comprobacionEmail);

    if ($conexion->connect_error) {
        die("Conexion fallida ". $conexion->connect_error);
    }
    //Si resultadoUsu devuelve alguna fila significa que ya existe un usuario con ese apodo
    if ($resultadoUsu->num_rows > 0){
        echo "El nombre de usuario no está disponible";
        //Si resultadoEmail devuelve alguna fila significa que ya existe un usuario con ese email
    }else if ($resultadoEmail->num_rows > 0){
        echo "El correo electrónico de usuario ya está en uso";
    }else{

        $consulta = "INSERT INTO `Usuario` (Apodo, Nombre, Apellidos, Correo, Contrasena, Admin) VALUES ('$usuario', '$nombre', '$apellidos', '$email', '$contrasena', 0)";
        if ($conexion->query($consulta) === TRUE) {
            echo "Datos insertados correctamente";
            $_SESSION["Usu"] = $usuario;
            enviarMail($email, $nombre);
            header("Location: ../confirmacionCuenta.html");
            exit();
        } else {
            echo "Error al insertar datos: " /*. $conexion->error*/;
        }

        $conexion->close();
    }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function enviarMail($correo, $nombre){
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
        $mail->Subject = 'Cuenta creada';
        //Conteido HTML
        $mail->Body    = '<h3>¡Hola '. $nombre .', tu cuenta a sido creado correctamente!</h3><br><p>Ahora podras disfrutar de todos los servicios que ofrecemos</p>';
        //Contenido alternativo en texto simple
        $mail->AltBody = '¡Hola '. $nombre .', tu cuenta a sido creado correctamente. Ahora podras disfrutar de todos los servicios que ofrecemos';
        //Enviar correo
        $mail->send();
        echo 'El mensaje se ha enviado con exito';
    } catch (Exception $e) {
        echo "El mensaje no se ha enviado: {$mail->ErrorInfo}";
        
    }
}
?>