<?php
    session_start();

    if(isset($_SESSION['usuario'])) {
        header('Location: View/');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login CssGrid || JCode</title>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-png">

    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <div class="container">
        <div class="container-login">
            <div class="login-top">
                <img src="assets/img/hamburguesa.png" alt="Icono de la Empresa"><span>fastFOOD</span>
            </div>

            <form id="login">
                <input type="text" placeholder="Usuario" name="loginUsuario" id="loginUsuario">
                <input type="password" placeholder="Contraseña" name="loginPassword" id="loginPassword">
                <input type="submit" class="ingresar" value="Ingresar">
            </form>

            <div class="login-bottom">
                ¿No tienes una cuenta? <span class="link" id="goRegister">Regístrate</span>
            </div>
        </div>

        <div class="container-register ocultar-form">
            <div class="login-top">
                <img src="assets/img/hamburguesa.png" alt="Icono de la Empresa"><span>fastFOOD</span>
            </div>

            <form id="register">
                <input type="text" placeholder="Nombre Usuario" name="registerUsuario" id="registerUsuario">

                <input type="password" placeholder="Contraseña" name="registerPassword" id="registerPassword">

                <input type="password" placeholder="Repita Contraseña" name="registerRepite" id="registerRepite">

                <input type="submit" class="ingresar" value="Registrarme">
            </form>

            <div class="login-bottom">
                ¿Ya tienes una cuenta? <span class="link" id="goLogin">Ingresar</span>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="Controller/login.js"></script>
</body>
</html>