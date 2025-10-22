<?php
require_once __DIR__ . '/../model/SoporteModel.php';

class SoporteController {
    private $soporteModel;

    public function __construct($db) {
        $this->soporteModel = new SoporteModel($db);
    }

    public function crearTicket($id_usuario, $ticket_name) {
        return $this->soporteModel->crearTicket($id_usuario, $ticket_name);
    }

    public function obtenerTicketsPorUsuario($id_usuario) {
        return $this->soporteModel->obtenerTicketsPorUsuario($id_usuario);
    }

    public function obtenerTicketPorId($ticket_id) {
        return $this->soporteModel->obtenerTicketPorId($ticket_id);
    }

    public function obtenerTodosLosTickets() {
    return $this->soporteModel->obtenerTodosLosTickets();
}

}
