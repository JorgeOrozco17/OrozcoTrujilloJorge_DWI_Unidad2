<?php
require_once 'db.php';

class UsuarioModel {
    private $conn;

    public function __construct($mysqli) {
        $this->conn = $mysqli;
    }

    public function existeCorreo($email) {
        $stmt = $this->conn->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $existe = $stmt->num_rows > 0;
        $stmt->close();
        return $existe;
    }

    public function registrarUsuario($nombre, $email, $password) {
        $tipo = 'estudiante';
        $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, email, password, tipo) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $email, $password, $tipo);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

    public function login($email, $password) {
    $stmt = $this->conn->prepare("SELECT id, nombre, email, tipo FROM usuarios WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();
    $stmt->close();
    return $usuario; // null si no coincide
}

// Guarda un código de recuperación para el email dado
public function setCodigoRecuperacion($email, $codigo) {
    $stmt = $this->conn->prepare("UPDATE usuarios SET codigo_recuperacion=? WHERE email=?");
    $stmt->bind_param("ss", $codigo, $email);
    return $stmt->execute();
}

// Verifica si existe un usuario con ese email y código
public function validarCodigo($email, $codigo) {
    $stmt = $this->conn->prepare("SELECT id FROM usuarios WHERE email=? AND codigo_recuperacion=?");
    $stmt->bind_param("ss", $email, $codigo);
    $stmt->execute();
    $stmt->store_result();
    $valido = $stmt->num_rows == 1;
    $user_id = null;
    if ($valido) {
        $stmt->bind_result($user_id);
        $stmt->fetch();
    }
    $stmt->close();
    return $user_id;
}

// Actualiza la contraseña y limpia el código de recuperación
public function actualizarPassword($user_id, $nueva) {
    $stmt = $this->conn->prepare("UPDATE usuarios SET password=?, codigo_recuperacion=NULL WHERE id=?");
    $stmt->bind_param("si", $nueva, $user_id);
    return $stmt->execute();
}

public function obtenerUsuarioPorId($id) {
    $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

public function mostrarUsuarios() {
    $stmt = $this->conn->prepare("SELECT * FROM usuarios");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

}
?>
