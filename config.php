<?php
include 'header.php'; 
?>

<style>
    .configcards{
        margin: 5%;
    }
    .card {
        width: 25rem;
        height: 17rem;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: scale(1.12);
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
    <div class="configcards">
        <div class="container mt-5">
            <h2 class="text-center mb-4">Ajustes de Configuración</h2>
            <br>
            <br>
            <div class="row gy-4">
                <!-- Card Buzón -->
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Buzón</h5>
                            <p class="card-text">Recibe los comentarios de personas no registradas, junto con sus datos para poder darles soporte o atención personalizada.</p>
                            <br>
                            <a href="buzon.php" class="btn btn-primary">Ir al Buzón</a>
                        </div>
                    </div>
                </div>

                <!-- Card Registrar -->
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Registrar</h5>
                            <p class="card-text">Permite registrar nuevos docentes y cursos en el sistema para poder gestionarlos eficientemente.</p>
                            <br>
                            <a href="registrar.php" class="btn btn-primary">Ir a Registrar</a>
                        </div>
                    </div>
                </div>

                <!-- Card Ayuda Admin -->
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ayuda Admin</h5>
                            <p class="card-text">Accede al área de soporte para usuarios registrados. Aquí puedes gestionar problemas o preguntas de los usuarios del sistema.</p>
                            <br>
                            <a href="ayuda_admin.php" class="btn btn-primary">Ir a Ayuda Admin</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Usuarios</h5>
                            <p class="card-text">Accede a la gestión de usuarios registrados en el sistema.</p>
                            <br>
                            <a href="usuarios.php" class="btn btn-primary">Ir a Usuarios</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include 'footer.php';
?>
