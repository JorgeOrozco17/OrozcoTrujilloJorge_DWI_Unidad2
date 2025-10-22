<?php
include 'header.php';
require_once __DIR__ . '/app/controller/ContactaController.php';
require_once 'vendor/autoload.php';  // Incluir PHPMailer

// Comprobar si se ha enviado el ID del mensaje
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener el mensaje a responder
    $contactoController = new ContactoController($mysqli);
    $mensaje = $contactoController->obtenerMensajePorId($id);

    if (!$mensaje) {
        echo "<p>Mensaje no encontrado.</p>";
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $respuesta = $_POST['respuesta'];
        
        // Validar si la respuesta no está vacía
        if (empty($respuesta)) {
            echo "<div class='alert alert-warning'>Por favor, escribe una respuesta antes de enviar.</div>";
            exit;
        }

        // Crear el correo de respuesta utilizando PHPMailer
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        try {
            // Configuración de servidor SMTP
            $mail->isSMTP();  // Usar SMTP
            $mail->Host = 'smtp.gmail.com';  // Servidor SMTP (Ejemplo: Gmail)
            $mail->SMTPAuth = true;  // Habilitar autenticación SMTP
            $mail->Username = 'jorgeorozcox3@gmail.com';  // Tu correo electrónico
            $mail->Password = 'ocjg colr mrhr wqbi';  // Tu contraseña de correo electrónico (o contraseña de aplicación si tienes 2FA)
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;  // Encriptación
            $mail->Port = 587;  // Puerto SMTP

            // Configuración del correo
            $mail->setFrom('jorgeorozcox3@gmail.com', 'Tu Nombre');
            $mail->addAddress($mensaje['email'], $mensaje['nombre']);  // Correo del usuario que dejó el mensaje

            // Contenido del correo
            $mail->isHTML(true);  // Correo en formato HTML
            $mail->Subject = 'Respuesta a tu mensaje';
            $mail->Body    = 'Hola ' . htmlspecialchars($mensaje['nombre']) . ',<br><br>' . nl2br(htmlspecialchars($respuesta)) . '<br><br>Saludos, tu equipo de soporte.';
            $mail->AltBody = 'Hola ' . htmlspecialchars($mensaje['nombre']) . ',\n\n' . $respuesta . '\n\nSaludos, tu equipo de soporte.';

            // Enviar el correo
            if ($mail->send()) {
                echo "<div class='alert alert-success'>Respuesta enviada correctamente.</div>";
            } else {
                echo "<div class='alert alert-danger'>Hubo un problema al enviar la respuesta.</div>";
            }
        } catch (Exception $e) {
            echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
        }

    }
} else {
    echo "<p>No se recibió el ID del mensaje.</p>";
    exit;
}

?>

<style>
    .cuerpo{
        margin: 5%;
    }
</style>

<main>
    <div class="cuerpo">
        <div class="container mt-5">
            <h2 class="text-center mb-4">Responder a la Solicitud</h2>

            <form method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($mensaje['nombre']); ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($mensaje['telefono']); ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" class="form-control" value="<?php echo htmlspecialchars($mensaje['email']); ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="mensaje">Mensaje Original:</label>
                    <textarea class="form-control" rows="4" disabled><?php echo htmlspecialchars($mensaje['mensaje']); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="respuesta">Tu Respuesta:</label>
                    <textarea class="form-control" name="respuesta" rows="4" required></textarea>
                </div>
                <br> <br>
                <button type="submit" class="btn btn-success">Enviar Respuesta</button>
            </form>
        </div>
    </div>
</main>

<?php
include 'footer.php';
?>
