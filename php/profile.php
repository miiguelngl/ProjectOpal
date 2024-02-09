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
                <a href="./tienda.php"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#809bbf" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                    </svg>
                </a>
            </div>';
            echo '<h5>Nombre: <span>'.$usuario['Nombre'].'</span></h5>';
            echo '<h5>Apellidos: <span>'.$usuario['Apellidos'].'</span></h5>';
            echo '<h5>Correo: <span>'.$usuario['Correo'].'</span></h5>';
            $stmt->close();
        ?>
      
    </div>
</div>