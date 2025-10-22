<?php
require_once __DIR__ . '/../model/CursoModel.php';

class CursoController {
    private $cursoModel;

    public function __construct($mysqli) {
        $this->cursoModel = new CursoModel($mysqli);
    }

    // Mostrar todos los cursos
    public function mostrarCursos() {
        return $this->cursoModel->obtenerCursos();
    }

    // Crear un nuevo curso
    public function registrarCurso($nombre, $descripcion, $imagen) {
        return $this->cursoModel->crearCurso($nombre, $descripcion, $imagen);
    }
}
?>
