<?php
include 'header.php';
require_once __DIR__ . '/app/controller/ChatController.php';
require_once __DIR__ . '/app/controller/SoporteController.php';
require_once __DIR__ . '/app/model/db.php';

$user_id = $_SESSION['usuario_id'] ?? null; // Asegúrate que tienes esto en tu login

// Controladores
$soporteController = new SoporteController($mysqli); // Necesitas este controlador
$chatController = new ChatController($mysqli);

// Crear ticket
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nuevo_ticket'])) {
    $titulo = $_POST['ticket_name'];
    $soporteController->crearTicket($user_id, $titulo);
    echo "<p>Ticket creado correctamente.</p>";
}

// Mostrar tickets del usuario
$tickets = $soporteController->obtenerTicketsPorUsuario($user_id);

// Si selecciona un ticket (ver chat)
$ticket_id = $_GET['ticket_id'] ?? null;
$mensajes = [];
if ($ticket_id) {
    $mensajes = $chatController->obtenerMensajesPorTicket($ticket_id);
    // Enviar mensaje
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nuevo_mensaje'])) {
        $mensaje = $_POST['mensaje'];
        $chatController->enviarMensaje($user_id, $ticket_id, $mensaje, "usuario");

        // Recargar mensajes después de enviar
        $mensajes = $chatController->obtenerMensajesPorTicket($ticket_id);
    }
}
?>

<main style="max-width:900px; margin:auto; padding:2rem 0;">
    <h1>Centro de Ayuda / Soporte</h1>

    <!-- Crear nuevo ticket -->
    <section style="margin-bottom:2rem;">
        <h2>Crear un nuevo ticket</h2>
        <form method="POST" style="display:flex; gap:1rem;">
            <input type="text" name="ticket_name" placeholder="Describe tu problema" required style="flex:1;">
            <button type="submit" name="nuevo_ticket">Crear Ticket</button>
        </form>
    </section>

    <!-- Listar tickets -->
    <section style="margin-bottom:2rem;">
        <h2>Mis Tickets</h2>
        <table border="1" cellpadding="8" cellspacing="0" style="width:100%; border-radius:8px;">
            <thead><tr><th>Ticket</th><th>Fecha</th><th>Acciones</th></tr></thead>
            <tbody>
            <?php foreach ($tickets as $ticket): ?>
                <tr>
                    <td><?= htmlspecialchars($ticket['ticket_name']) ?></td>
                    <td><?= $ticket['fecha'] ?></td>
                    <td>
                        <a href="ayuda.php?ticket_id=<?= $ticket['id'] ?>">Ver Chat</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <!-- Chat del ticket seleccionado -->
    <?php if ($ticket_id): ?>
    <section style="margin-bottom:2rem;">
        <h2>Chat del Ticket</h2>
        <div style="background:#fafbfc; border:1px solid #eee; border-radius:8px; padding:1rem; max-height:250px; overflow-y:auto;">
            <?php foreach ($mensajes as $msg): ?>
                <div style="margin-bottom:1em;<?= $msg['id_personal']==$user_id ? 'text-align:right;' : 'text-align:left;' ?>">
                    <b><?= $msg['id_personal']==$user_id ? 'Yo' : 'Soporte' ?>:</b>
                    <?= htmlspecialchars($msg['mensaje']) ?>
                    <br><small style="color:#999;"><?= $msg['fecha'] ?></small>
                </div>
            <?php endforeach; ?>
        </div>
        <form method="POST" style="margin-top:1rem; display:flex; gap:1rem;">
            <input type="text" name="mensaje" placeholder="Escribe tu mensaje..." required style="flex:1;">
            <button type="submit" name="nuevo_mensaje">Enviar</button>
        </form>
    </section>
    <?php endif; ?>
</main>

<?php include 'footer.php'; ?>
