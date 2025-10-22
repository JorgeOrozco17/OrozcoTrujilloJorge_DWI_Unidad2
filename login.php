<?php
  include 'head.php';
  require_once __DIR__ . '/app/controller/UsuarioController.php';

  session_start();
  $mensaje = "";

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $usuarioController = new UsuarioController($mysqli);
      $resultado = $usuarioController->login($email, $password);

      if ($resultado['exito']) {
          // Variables de sesión
          $_SESSION['usuario_id'] = $resultado['usuario']['id'];
          $_SESSION['usuario_nombre'] = $resultado['usuario']['nombre'];
          $_SESSION['usuario_tipo'] = $resultado['usuario']['tipo'];
          // Redirigir a dashboard
          header("Location: dashboard.php");
          exit;
      } else {
          $mensaje = $resultado['mensaje'];
      }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
   <?php if($mensaje) echo "<div style='color:crimson; text-align:center; font-weight:600;'>$mensaje</div>"; ?>
  <main>
    <div class="centro-form">
      <div class="form-container">
        <p class="title">Bienvenido de vuelta</p>
        <form class="form" method="POST">
            <input type="email" name="email" class="input" placeholder="Email" required>
            <input type="password" name="password" class="input" placeholder="Contraseña" required>

            <a href="recuperar.php" class="page-link-label">Forgot Password?</a>
            
            <button class="form-btn" type="submit">Log in</button>
        </form>
        <p class="sign-up-label">
          Don't have an account?<a href="registro.php" class="sign-up-link">Sign up</a>
        </p>
      </div>
    </div>
  </main>
</body>
</html>