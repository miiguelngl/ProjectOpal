<div class="caseProfile">
    <img src="img/pabloMotos.jpeg" alt="Foto de perfil">
    <div class="caseProfile-Info">
        <?php

            include 'conexion.php';
            // session_start();
            if (!isset($_SESSION['Usu'])) {
                header("Location: ./index.php");
            }
            $username = $_SESSION['Usu'];
            $consulta = "SELECT * FROM `Usuario` WHERE `Apodo` = ?";

            $stmt = $conexion->prepare($consulta);
            $stmt->bind_param("s", $username);
            $stmt->execute();


            $resultado = $stmt->get_result();
            $usuario = $resultado->fetch_assoc();
            

            echo '<h2>'. $usuario['Apodo'].'</h2>';
            echo '<h5>Nombre: <span>'.$usuario['Nombre'].'</span></h5>';
            echo '<h5>Apellidos: <span>'.$usuario['Apellidos'].'</span></h5>';
            echo '<h5>Correo: <span>'.$usuario['Correo'].'</span></h5>';
            $stmt->close();
        ?>
      
    </div>
</div>