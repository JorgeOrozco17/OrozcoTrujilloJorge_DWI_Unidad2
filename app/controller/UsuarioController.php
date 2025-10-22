<?php
require_once __DIR__ . '/../model/UsuarioModel.php';

class UsuarioController {
    private $usuarioModel;

    public function __construct($mysqli) {
        $this->usuarioModel = new UsuarioModel($mysqli);
    }

    public function registrar($nombre, $email, $password) {
        if ($this->usuarioModel->existeCorreo($email)) {
            return "El correo ya está registrado.";
        } else {
            if ($this->usuarioModel->registrarUsuario($nombre, $email, $password)) {
                return "Registro exitoso. Ahora puedes iniciar sesión.";
            } else {
                return "Error al registrar usuario.";
            }
        }
    }

    public function login($email, $password) {
    $usuario = $this->usuarioModel->login($email, $password);
    if ($usuario) {
        return [
            'exito' => true,
            'usuario' => $usuario
        ];
    } else {
        return [
            'exito' => false,
            'mensaje' => 'Correo o contraseña incorrectos.'
        ];
    }
}

// Generar y enviar el código de recuperación por email
public function enviarCodigoRecuperacion($email) {
    if ($this->usuarioModel->existeCorreo($email)) {
        $codigo = rand(100000, 999999);
        $this->usuarioModel->setCodigoRecuperacion($email, $codigo);

        // Enviar el código por correo
        $asunto = "Código de recuperación - DwCursor";
        $mensajeMail = "Tu código de recuperación es: $codigo";
        $cabeceras = "From: noreply@dwcursor.com\r\n";
        @mail($email, $asunto, $mensajeMail, $cabeceras);

        return ["exito" => true, "mensaje" => "Se ha enviado un código de recuperación a tu correo."];
    } else {
        return ["exito" => false, "mensaje" => "El correo no está registrado."];
    }
}

// Cambiar contraseña usando código de recuperación
public function cambiarPasswordConCodigo($email, $codigo, $nueva, $confirmar) {
    if ($nueva !== $confirmar) {
        return ["exito" => false, "mensaje" => "Las contraseñas no coinciden."];
    }
    $user_id = $this->usuarioModel->validarCodigo($email, $codigo);
    if ($user_id) {
        $this->usuarioModel->actualizarPassword($user_id, $nueva);
        return ["exito" => true, "mensaje" => "Contraseña actualizada. <a href='login.php'>Inicia sesión</a>"];
    } else {
        return ["exito" => false, "mensaje" => "Código incorrecto o expirado."];
    }
}

public function obtenerUsuarioPorId($id) {
    return $this->usuarioModel->obtenerUsuarioPorId($id);
}

public function mostrarUsuarios() {
    return $this->usuarioModel->mostrarUsuarios();
}


}
?>
