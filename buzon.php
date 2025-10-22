<?php
include 'header.php';
require_once __DIR__ . '/app/controller/ContactaController.php';

$contactoController = new ContactoController($mysqli);
$result = $contactoController->mostrarMensajes();
?>

<style>
    .cuerpo{
        margin: 5%;
    }
</style>

<?php if(isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'admin'): ?>
<main>
    <div class="cuerpo">
        <div class="container mt-5">
            <h2 class="text-center mb-4">Mensajes Recibidos</h2>

            <!-- Tabla de mensajes -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Mensaje</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($row['telefono']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['mensaje']); ?></td>
                                <td>
                                <!-- Botón de respuesta que redirige a respuesta.php -->
                                <a href="respuesta.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Responder</a>
                            </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">No hay mensajes.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php else: ?>
<main>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body">
                        <div class="text-center">
                                <img src="assets/img/no_acceso.png" alt="Sin acceso" class="img-fluid" style="max-width: 350px;">
                                <p class="mt-3 text-danger"> Se necesitan permisos de administrador para acceder a esta pagina.</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Estilos personalizados -->
    <style>
        .card {
            border-radius: 2rem;
        }
        .table thead th {
            border-top: none;
            font-weight: 600;
            letter-spacing: 0.05em;
        }
        .table tbody tr:hover {
            background: #f0f4fa;
        }
        .table {
            border-radius: 1rem;
            overflow: hidden;
        }
    </style>
</main>
<?php endif; ?>

<?php
include 'footer.php';
?>