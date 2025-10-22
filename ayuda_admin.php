<?php
include 'header.php';
require_once __DIR__ . '/app/model/db.php';
require_once __DIR__ . '/app/controller/ChatController.php';
require_once __DIR__ . '/app/controller/SoporteController.php';
require_once __DIR__ . '/app/controller/UsuarioController.php'; // Para obtener el nombre del usuario si quieres

$user_id = $_SESSION['usuario_id'] ?? null;


$soporteController = new SoporteController($mysqli);
$chatController = new ChatController($mysqli);
$usuarioController = new UsuarioController($mysqli);

// Mostrar todos los tickets
$tickets = $soporteController->obtenerTodosLosTickets(); // Este método lo tienes que agregar al controller/model

// Ver chat de un ticket
$ticket_id = $_GET['ticket_id'] ?? null;
$mensajes = [];
if ($ticket_id) {
    $mensajes = $chatController->obtenerMensajesPorTicket($ticket_id);
    // Enviar mensaje como admin/soporte
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nuevo_mensaje'])) {
        $mensaje = $_POST['mensaje'];
        $chatController->enviarMensaje($user_id, $ticket_id, $mensaje, "admin");
        $mensajes = $chatController->obtenerMensajesPorTicket($ticket_id);
    }
}
?>


<?php if(isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'admin'): ?>
<main style="max-width:1000px; margin:auto; padding:2rem 0;">
    <h1>Soporte: Panel de Tickets</h1>

    <!-- Listar todos los tickets -->
    <section style="margin-bottom:2rem;">
        <h2>Todos los Tickets</h2>
        <table border="1" cellpadding="8" cellspacing="0" style="width:100%; border-radius:8px;">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Ticket</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($tickets as $ticket): 
                $usuario = $usuarioController->obtenerUsuarioPorId($ticket['id_personal']);
            ?>
                <tr>
                    <td><?= htmlspecialchars($usuario['nombre'] ?? 'Usuario desconocido') ?></td>
                    <td><?= htmlspecialchars($ticket['ticket_name']) ?></td>
                    <td><?= $ticket['fecha'] ?></td>
                    <td>
                        <a href="ayuda_admin.php?ticket_id=<?= $ticket['id'] ?>">Ver Chat</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <!-- Chat del ticket seleccionado -->
    <?php if ($ticket_id): ?>
    <section style="margin-bottom:2rem;">
        <h2>Chat del Ticket #<?= $ticket_id ?></h2>
        <div style="background:#fafbfc; border:1px solid #eee; border-radius:8px; padding:1rem; max-height:250px; overflow-y:auto;">
            <?php foreach ($mensajes as $msg): ?>
                <div style="margin-bottom:1em;<?= $msg['id_personal']==$admin_id ? 'text-align:right;' : 'text-align:left;' ?>">
                    <b>
                        <?php
                            if ($msg['remitente'] === "admin") {
                                echo "Soporte:";
                            } elseif ($msg['remitente'] === "usuario") {
                                echo "Usuario:";
                            } else {
                                echo "Desconocido:";
                            }
                        ?>
                    </b>
                    <?= htmlspecialchars($msg['mensaje']) ?>
                </div>
            <?php endforeach; ?>
        </div>
        <form method="POST" style="margin-top:1rem; display:flex; gap:1rem;">
            <input type="text" name="mensaje" placeholder="Escribe tu respuesta..." required style="flex:1;">
            <button type="submit" name="nuevo_mensaje">Enviar</button>
        </form>
    </section>
    <?php endif; ?>
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