<?php
require_once 'db.php';

class RecuperacionModel {
    private $conn;

    public function __construct($mysqli) {
        $this->conn = $mysqli;
    }

    public function verificarEmail($email) {
        $stmt = $this->conn->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        // Ahora verificamos si se obtuvo un resultado
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            // Si hay resultados, retornamos el primer ID de usuario
            $row = $result->fetch_assoc();
            $user_id = $row['id'];  // Asignamos el ID del usuario
            return $user_id;
        } else {
            // Si no se encuentra el usuario, retornamos null
            return null;
        }
    }


    public function generarCodigoRecuperacion($email) {
        // Genera un código numérico aleatorio de 5 dígitos
        $codigo = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);

        // Prepara la consulta para actualizar el código de recuperación
        $stmt = $this->conn->prepare("UPDATE usuarios SET codigo_recuperacion = ? WHERE email = ?");
        $stmt->bind_param("ss", $codigo, $email);
        return $stmt->execute();
    }

    public function obtenerCodigoRecuperacion($email) {
    $codigo_recuperacion = null;
    // Prepara la consulta para obtener el código de recuperación de la base de datos
    $stmt = $this->conn->prepare("SELECT codigo_recuperacion FROM usuarios WHERE email = ? ; ");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($codigo_recuperacion);
    $stmt->fetch();
    $stmt->close();

    // Si se encuentra el código de recuperación, lo retornamos, de lo contrario retornamos null
    return $codigo_recuperacion ? $codigo_recuperacion : null;
}

    public function actualizarPassword($email, $nueva) {
    $stmt = $this->conn->prepare("UPDATE usuarios SET password=?, codigo_recuperacion=NULL WHERE email=?");
    $stmt->bind_param("ss", $nueva, $email);
    return $stmt->execute();
}

}
?>
