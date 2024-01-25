<?php
    //Comprueba si existe una sesión ya iniciada en el dispositivo
    
    session_start();
    /*session_destroy();
    session_start();*/
    //Mostrar errores 
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    //Si la $SESSION no es nulo pasa directamente al index con la sesion iniciada
    if(isset($_SESSION['Usu'])){
    
        header("Location: ../../index.html");
    }else{  
        header("Location: ./signIn.html");
    }
?>