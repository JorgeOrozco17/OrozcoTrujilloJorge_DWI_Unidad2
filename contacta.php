<?php
include 'head.php';
require_once __DIR__ . '/app/controller/contactaController.php';

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST['nombre']);
    $telefono = trim($_POST['telefono']);
    $email = trim($_POST['email']);
    $texto = trim($_POST['mensaje']);

    $contactoController = new ContactoController($mysqli);
    $mensaje = $contactoController->guardar($nombre, $telefono, $email, $texto);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contáctanos</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php if($mensaje) echo "<div style='color: teal; text-align:center; font-weight:600;'>$mensaje</div>"; ?>
    <main>
        <div class="centro-form">
            <div class="form-container-registro">
                <p class="title">Contáctanos</p>
                <form class="form" method="POST" autocomplete="off">
                    <input type="text" name="nombre" class="input" placeholder="Nombre completo" required>
                    <input type="text" name="telefono" class="input" placeholder="Teléfono" required>
                    <input type="email" name="email" class="input" placeholder="Correo electrónico" required>
                    <textarea name="mensaje" class="input" placeholder="Tu mensaje" rows="4" style="resize:none;" required></textarea>
                    <button class="form-btn" type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
