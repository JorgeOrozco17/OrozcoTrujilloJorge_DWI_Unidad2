<?php
include 'header.php';
require_once __DIR__ . '/app/controller/CursoController.php';

$cursoController = new CursoController($mysqli);
$cursos = $cursoController->mostrarCursos();

?>
<style>
    .card {
        width: 50vh;
        height: 60vh;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
     .card:hover {
        transform: scale(1.05);
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 1.2em;
        font-weight: bold;
    }

    .card-text {
        font-size: 1em;
        color: #555;
    }
</style>
<main>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Cursos Disponibles</h2>
        <div class="row">
            <?php foreach($cursos as $curso): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="assets/img/<?= $curso['imagen'] ?>" class="card-img-top" alt="<?= $curso['nombre'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $curso['nombre'] ?></h5>
                            <p class="card-text"><?= substr($curso['descripcion'], 0, 100) . '...' ?></p>
                            <a href="inscripcion.php?id=<?= $curso['id'] ?>" class="btn btn-primary">Inscribirme</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php

include 'footer.php';

?>

