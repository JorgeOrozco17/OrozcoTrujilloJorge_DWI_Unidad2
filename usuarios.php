<?php
include 'header.php';
require_once __DIR__ . '/app/controller/UsuarioController.php';

$usuarioController = new UsuarioController($mysqli);
$usuarios = $usuarioController->mostrarUsuarios();
?>


<?php if(isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'admin'): ?>
<main>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body">
                        <div class="mb-4 text-center">
                            <h2 class="fw-bold mb-1">Lista de Usuarios</h2>
                            <p class="text-muted mb-0">Consulta la información general de los usuarios registrados.</p>
                            <!--
                            <a href="usuarioform.php" class="btn btn-primary btn-sm mt-3">
                                <i class="bi bi-person-plus"></i> Agregar Usuario
                            </a>
                            -->
                        </div>
                        <div class="table-responsive">
                            <table id="tablaComun" class="table table-hover align-middle rounded-3 overflow-hidden">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Tipo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($usuarios as $u): ?>
                                    <tr>
                                        <td class="text-center"><?= htmlspecialchars($u['id']) ?></td>
                                        <td><?= htmlspecialchars($u['nombre']) ?></td>
                                        <td><?= htmlspecialchars($u['email']) ?></td>
                                        <td>
                                            <span class="badge bg-<?= $u['tipo'] === 'admin' ? 'primary' : 'secondary' ?>">
                                                <?= htmlspecialchars(ucfirst($u['tipo'])) ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-end mt-3">
                            <small class="text-muted">Total de usuarios: <?= count($usuarios) ?></small>
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
