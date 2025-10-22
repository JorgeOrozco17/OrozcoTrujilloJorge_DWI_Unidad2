<?php
require_once __DIR__ . '/../model/RecuperacionModel.php';
require_once __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class RecuperacionController {
    private $recuperacionModel;

    public function __construct($mysqli) {
        $this->recuperacionModel = new RecuperacionModel($mysqli);
    }

    public function verificarEmail($email) {
        return $this->recuperacionModel->verificarEmail($email);
    }

    public function generarCodigoRecuperacion($email) {
        return $this->recuperacionModel->generarCodigoRecuperacion($email);
    }

    public function verificarCodigoYActualizarPassword($email, $codigo, $nueva_contrasena) {
    // Obtener el código de la base de datos
    $codigo_recuperacion = $this->recuperacionModel->obtenerCodigoRecuperacion($email);
    
    // Verificar el código
    if ($codigo_recuperacion === $codigo) {
        // Si el código coincide, actualiza la contraseña
        $actualizado = $this->recuperacionModel->actualizarPassword($email, $nueva_contrasena);
        if ($actualizado) {
            header('Location: login.php'); // Redirigir al inicio de sesión
        } else {
            return ['success' => false, 'message' => 'Error al actualizar la contraseña.'];
        }
    } else {
        // Código incorrecto
        return ['success' => false, 'message' => 'Código incorrecto o ha expirado.'];
    }
}


    public function recuperarCuenta($email) {
        // Verifica si el correo existe
        $user_id = $this->verificarEmail($email);
        if ($user_id) {
            if ($this->generarCodigoRecuperacion($email)) {
                $codigo = $this->recuperacionModel->obtenerCodigoRecuperacion($email);
                // Enviar el correo con el código de recuperación
                if ($this->enviarCorreoRecuperacion($email, $codigo)) {
                    return "Código de recuperación enviado correctamente.";
                } else {
                    return "Error al enviar el correo.";
                }
            } else {
                return "Error al generar el código de recuperación.";
            }
        } else {
            return "Correo no encontrado.";
        }
    }

    // Método para enviar el código de recuperación por correo
    public function enviarCorreoRecuperacion($email, $codigo) {
        $mail = new PHPMailer(true);
        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Usar SMTP de Gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'jorgeorozcox3@gmail.com';  // Tu correo electrónico
            $mail->Password = 'ocjg colr mrhr wqbi';  // Cambia por tu contraseña de Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Remitente y destinatario
            $mail->setFrom('tu_email@gmail.com', 'Recuperación de Cuenta');
            $mail->addAddress($email);

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Recuperación de Cuenta';
            $mail->Body    = "Tu código de recuperación es: <b>$codigo</b><br>Usa este código para restablecer tu contraseña.";

            // Enviar el correo
            $mail->send();

            // Redirigir a la página de verificación
            header('Location: verificar.php?email=' . urlencode($email));  // Redirigir con el email como parámetro
            exit();

            return true;  
        } catch (Exception $e) {
            return "Error al enviar el correo: {$mail->ErrorInfo}";
        }
    }
}
?>
