<?php
require_once __DIR__ . '/../model/ContactaModel.php';

class ContactoController {
    private $contactoModel;

    public function __construct($mysqli) {
        $this->contactoModel = new ContactoModel($mysqli);
    }

    public function guardar($nombre, $telefono, $email, $mensaje) {
        if ($this->contactoModel->guardarMensaje($nombre, $telefono, $email, $mensaje)) {
            return "¡Mensaje enviado correctamente!";
        } else {
            return "Error al enviar el mensaje.";
        }
    }

    // Obtener los mensajes del buzón
    public function mostrarMensajes() {
        return $this->contactoModel->obtenerMensajes();
    }

    public function obtenerMensajePorId($id){
        return $this->contactoModel->obtenerMensajePorId($id);
    }
}
?>
