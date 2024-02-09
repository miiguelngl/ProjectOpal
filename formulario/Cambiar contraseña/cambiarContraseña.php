<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/normalize.css">
    <link rel="stylesheet" href="../../css/signIn.css">
    <link rel="stylesheet" href="../fonts/material-icon/css/material-design-iconic-font.min.css">
    <script defer src="../../js/validacionContraseña.js"></script>
    <title>Opal</title>
</head>
<style>
    #id{
        display: none;
    }
</style>
<body>
    <main>
        <div id="formulario">
            <img src="../../img/LogoOpal.png" alt="" height="100px">
            <div class="signin-form">
                <h2>Cambiar contraseña</h2>
                <form method="POST" class="register-form" id="login-form" action="cambioContraseña.php">
                    <div class="datosLogIn">
                        <label for="pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" name="pass" id="pass" placeholder="Contraseña nueva"/>
                    </div>
                    <div class="datosLogIn">
                        <label for="re-pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="re_pass" id="re_pass" placeholder="Repita su contraseña"/>
                    </div>
                    <?php
                        if(isset($_GET['id'])){
                            $p = $_GET['id'];
                            echo '<input type="number" id="id" name="id" value="'. $p .'">';
                        }
                    ?>
                    <div class="form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Confirmar"/>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
