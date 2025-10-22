<?php
include 'head.php';
require_once __DIR__ . '/app/controller/RecuperacionController.php';

// Procesar el formulario cuando se envía
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $codigo = $_POST['codigo'];
    $nueva_contrasena = $_POST['nueva_contrasena'];

    $recuperacionController = new RecuperacionController($mysqli);

    // Ahora una sola llamada
    $resultado = $recuperacionController->verificarCodigoYActualizarPassword($email, $codigo, $nueva_contrasena);

    echo $resultado['message'];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <main>
        <div class="centro-form">
            <div class="form-container">
                <p class="title">Restablecer Contraseña</p>
                <form method="POST" class="form">
                    <input type="email" name="email" class="input" value="<?php echo $_GET['email']; ?>" required readonly>
                    <input type="text" name="codigo" class="input" placeholder="Ingresa el código de verificación" required>
                    <input type="password" name="nueva_contrasena" class="input" placeholder="Nueva contraseña" required>
                    <button class="form-btn" type="submit">Restablecer Contraseña</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
