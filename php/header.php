<header>
        <nav>
            <div id="header-menu-movil">
                <button id="botonMenu">
                    <img src="./img/menu.png" alt="Logo de Perfil">
                </button>
                <nav id="header-menu-nav">
                    <ul>
                        <li><a href="tienda.php">Tienda</a></li>
                        <li><a href="subirProducto.php">Subir producto</a></li>
                        <li><a href="aboutUs.php">Sobre nosotros</a></li>
                        <li><a href="contacto.php">Contacto</a></li>
                    </ul>
                </nav>
            </div>
            <div>
                <a href="index.php">
                    <img src="./img/LogoOpal.png" alt="Logo de Opal" height="80px">
                </a>
            </div>
            <form action="./php/buscador.php" method="post">
                <div id="cajaBuscador">
                    <input name="campo" type="text" placeholder="Buscar sneakers..." id="buscador">
                    <ul id="contenido"></ul>
                </div>
            </form>
            
            <div>
                <?php
                    echo'<a href="./profile.php">';
                ?>
                        
                
            <?php
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                 if(isset($_SESSION['Usu'])){
                    echo '<button id="userButton">';
                    echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='#f2f2f2' class='bi bi-person-fill' viewBox='0 0 16 16'>";
                    echo "<path d='M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6'/>";
                    echo "</svg>";
                    echo $_SESSION['Usu'];  
                    echo "</button>";
                    echo'</a>';
                    
                }else{

                    echo '<button id="registroButton">';
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
            <a href="tienda.php">Tienda</a>
            <a href="subirProducto.php">Subir producto</a>
            <a href="aboutUs.php">Sobre nosotros</a>
            <a href="contacto.php">Contacto</a>
        </nav>
        <script src="./js/buscador.js"></script>
    </header>