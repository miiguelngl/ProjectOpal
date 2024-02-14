<div class="caseProfile">
    <div id="imgProfile" href="">
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
            

            echo '<div class="caseProfileTitle">
                <h2>'. $usuario['Apodo'].'</h2>
                <a href="#" id="cerrar"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                        <path d="M7.5 1v7h1V1z"/>
                        <path d="M3 8.812a5 5 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812"/>
                    </svg>
                </a>
            </div>';
            echo '<h5>Nombre: <span>'.$usuario['Nombre'].'</span></h5>';
            echo '<h5>Apellidos: <span>'.$usuario['Apellidos'].'</span></h5>';
            echo '<h5>Correo: <span>'.$usuario['Correo'].'</span></h5>';
            $stmt->close();
        ?>
      
    </div>
    <script src="./js/cerrarSesion.js"></script>
</div>