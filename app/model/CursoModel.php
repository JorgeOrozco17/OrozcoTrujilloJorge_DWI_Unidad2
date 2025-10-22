<?php
require_once 'db.php';

class CursoModel {
    private $conn;

    public function __construct($mysqli) {
        $this->conn = $mysqli;
    }

    // Obtener todos los cursos
    public function obtenerCursos() {
        $query = "SELECT id, nombre, descripcion, imagen FROM cursos";
        $result = $this->conn->query($query);
        $cursos = [];
        while ($row = $result->fetch_assoc()) {
            $cursos[] = $row;
        }
        return $cursos;
    }

    // Insertar un nuevo curso
    public function crearCurso($nombre, $descripcion, $imagen) {
        $stmt = $this->conn->prepare("INSERT INTO cursos (nombre, descripcion, imagen) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $descripcion, $imagen);
        return $stmt->execute();
    }
}
?>
