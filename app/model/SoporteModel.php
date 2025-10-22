<?php

class SoporteModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Crear un nuevo ticket
    public function crearTicket($id_usuario, $ticket_name) {
        $stmt = $this->conn->prepare("INSERT INTO soportes (id_personal, ticket_name, fecha) VALUES (?, ?, NOW())");
        $stmt->bind_param("is", $id_usuario, $ticket_name);
        return $stmt->execute();
    }

    // Obtener todos los tickets de un usuario
    public function obtenerTicketsPorUsuario($id_usuario) {
        $stmt = $this->conn->prepare("SELECT * FROM soportes WHERE id_personal = ? ORDER BY fecha DESC");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Obtener un ticket específico (opcional, útil para validaciones)
    public function obtenerTicketPorId($ticket_id) {
        $stmt = $this->conn->prepare("SELECT * FROM soportes WHERE id = ?");
        $stmt->bind_param("i", $ticket_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Obtener todos los tickets
public function obtenerTodosLosTickets() {
    $stmt = $this->conn->prepare("SELECT * FROM soportes ORDER BY fecha DESC");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

}
