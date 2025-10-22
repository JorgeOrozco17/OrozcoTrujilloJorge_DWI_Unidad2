<?php
require_once 'db.php';

class ContactoModel {
    private $conn;

    public function __construct($mysqli) {
        $this->conn = $mysqli;
    }

    public function guardarMensaje($nombre, $telefono, $email, $mensaje) {
        $stmt = $this->conn->prepare("INSERT INTO contacto (nombre, telefono, email, mensaje) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $telefono, $email, $mensaje);
        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }

     public function obtenerMensajes() {
        $query = "SELECT id, nombre, telefono, email, mensaje, fecha FROM contacto ORDER BY fecha DESC";
        $result = $this->conn->query($query);
        
        // Retorna los mensajes obtenidos
        return $result;
    }

    public function obtenerMensajePorId($id){
        // Preparar la consulta
        $stmt = $this->conn->prepare("SELECT id, nombre, telefono, email, mensaje, fecha FROM contacto WHERE id = ?");
        $stmt->bind_param("i", $id);  // Vincular el parámetro como entero
        $stmt->execute();

        // Obtener el resultado de la consulta
        $result = $stmt->get_result();

        // Verificar si el mensaje existe
        if ($result->num_rows > 0) {
            // Retornar el primer mensaje encontrado
            return $result->fetch_assoc();
        } else {
            return null;  // No se encontró el mensaje
        }
        $stmt->close();
        return $result->fetch_assoc();
    }

}
?>
