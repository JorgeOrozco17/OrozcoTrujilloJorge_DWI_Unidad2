<?php
include 'head.php';
require_once __DIR__ . '/app/controller/UsuarioController.php';

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmar = $_POST['confirmar'];

    if ($password !== $confirmar) {
        $mensaje = "Las contraseñas no coinciden.";
    } else {
        $usuarioController = new UsuarioController($mysqli);
        $mensaje = $usuarioController->registrar($nombre, $email, $password);
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php if($mensaje) echo "<div style='color: teal; text-align:center; font-weight:600;'>$mensaje</div>"; ?>
    <main>
        <div class="centro-form">
            <div class="form-container-registro">
                <p class="title">Crea tu cuenta</p>
                <form class="form" method="POST">
                    <input type="text" name="nombre" class="input" placeholder="Nombre completo" required>
                    <input type="email" name="email" class="input" placeholder="Email" required>
                    <input type="password" name="password" class="input" placeholder="Contraseña" required>
                    <input type="password" name="confirmar" class="input" placeholder="Confirmar contraseña" required>
                    <button class="form-btn" type="submit">Registrarse</button>
                </form>
                <p class="sign-up-label">
                    ¿Ya tienes una cuenta? <a href="login.php" class="sign-up-link">Inicia sesión</a>
                </p>
            </div>
        </div>
    </main>
</body>
</html>
