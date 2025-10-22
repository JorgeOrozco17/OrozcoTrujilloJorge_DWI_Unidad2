<?php
require_once __DIR__ . '/../model/ChatModel.php';

class ChatController {
    private $chatModel;

    public function __construct($db) {
        $this->chatModel = new ChatModel($db);
    }

    // Obtiene los mensajes por ticket (id_sesion = id del ticket)
    public function obtenerMensajesPorTicket($ticket_id) {
        return $this->chatModel->obtenerMensajesPorTicket($ticket_id);
    }

    // Envía un mensaje (id_personal = quien envía, id_sesion = id del ticket)
    public function enviarMensaje($id_personal, $ticket_id, $mensaje, $remitente = "usuario") {
    return $this->chatModel->enviarMensaje($id_personal, $ticket_id, $mensaje, $remitente);
}

}
