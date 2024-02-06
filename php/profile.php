<div class="caseProfile">
    <div id="imgProfile">
        <svg xmlns='http://www.w3.org/2000/svg' width='112' height='112' fill='#f2f2f2' class='bi bi-person-fill' viewBox='0 0 16 16'>
            <path d='M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6'/>
        </svg>
    </div>
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