<header>
        <nav>
            <div id="header-menu-movil">
                <button id="botonMenu">
                    <img src="./img/menu.png" alt="Logo de Pepote">
                </button>
                <nav id="header-menu-nav">
                    <ul>
                        <li><a href="">Tienda</a></li>
                        <li><a href="./formulario/SubirProducto/subirProducto.php">Subir producto</a></li>
                        <li><a href="">Sobre nosotros</a></li>
                        <li><a href="../contacto.php">Contacto</a></li>
                    </ul>
                </nav>
            </div>
            <div>
                <a href="index.php">
                    <img src="./img/LogoOpal.png" alt="Logo de Opal" height="80px">
                </a>
            </div>
            <div id="cajaBuscador">
                <input type="text" placeholder="Buscar sneakers..." id="buscador">
            </div>
            <div>
                <button id="registroButton">
            <?php
                session_start();

                 if(isset($_SESSION['Usu'])){
                    echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='#5B85D9' class='bi bi-person-fill' viewBox='0 0 16 16'>";
                    echo "<path d='M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6'/>";
                    echo "</svg>";
                    echo "</button>";
                    echo $_SESSION['Usu'];  
                    
                }else{

                    echo "<a href='./formulario/IniciarSesion/signInComprobacion.php' id='registroButtonPC'>Iniciar sesión/Registrarse</a>";
                    echo "<a href='./formulario/IniciarSesion/signInComprobacion.php' id='registroButtonMobile'>";
                    echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person' viewBox='0 0 16 16'>";
                    echo "<path d='M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z'/>";
                    echo "</svg>";
                    echo "</a>";
                    echo "</button>";
                }
                ?>
            </div>
        </nav>
        <nav id="menu">
            <a href="">Tienda</a>
            <a href="subirProducto.php">Subir producto</a>
            <a href="">Sobre nostros</a>
            <a href="contacto.php">Contacto</a>
        </nav>
    </header>