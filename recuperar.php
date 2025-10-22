<?php
// recuperar.php

include 'head.php';
require_once __DIR__ . '/app/model/db.php';
require_once __DIR__ . '/app/controller/RecuperacionController.php';
require_once __DIR__ . '/app/model/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Crear instancia del controlador
    $controlador = new RecuperacionController($mysqli);

    // Intentar recuperar la cuenta
    if ($controlador->recuperarCuenta($email)) {
        echo "Hemos enviado un correo con un código de recuperación.";
    } else {
        echo "El correo ingresado no está registrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Cuenta</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <main>
        <div class="centro-form">
            <div class="form-container">
                <p class="title">Recupera tu cuenta</p>
                <form method="POST" class="form">
                    <input type="email" name="email" class="input" placeholder="Ingresa tu email" required>
                    <button class="form-btn" type="submit">Enviar enlace</button>
                </form>
                <p class="sign-up-label">
                    ¿Recordaste tu contraseña? <a href="login.php" class="sign-up-link">Inicia sesión</a>
                </p>
            </div>
        </div>
    </main>
</body>
</html>
