<?php

class ChatModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener todos los mensajes para un ticket (id_sesion)
    public function obtenerMensajesPorTicket($ticket_id) {
        $stmt = $this->conn->prepare("SELECT * FROM chat WHERE id_sesion = ? ORDER BY fecha ASC");
        $stmt->bind_param("i", $ticket_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Guardar un mensaje en el chat
    public function enviarMensaje($id_personal, $ticket_id, $mensaje, $remitente = "usuario") {
    $stmt = $this->conn->prepare(
        "INSERT INTO chat (id_personal, id_sesion, mensaje, remitente, fecha) VALUES (?, ?, ?, ?, NOW())"
    );
    $stmt->bind_param("iiss", $id_personal, $ticket_id, $mensaje, $remitente);
    return $stmt->execute();
}
}
