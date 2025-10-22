<?php
session_start();
if (!isset($_SESSION['usuario_id']) || !isset($_SESSION['usuario_nombre']) || !isset($_SESSION['usuario_tipo'])) {
    header("Location: index.php");
    exit;
}

$usuario = $_SESSION['usuario_nombre'];
$rol = $_SESSION['usuario_tipo'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Dwcursor</title>
  <meta name="description" content="">
  <meta name="keywords" content="">


  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center">

      <a href="dashboard.php" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">DwCursor</h1><span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="dashboard.php" class="active">Home</a></li>
          <li><a href="cursos.php">Cursos</a></li>
          <?php if(isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'estudiante'): ?>
          <li><a href="tablero.php">Mis cursos</a></li>
          <?php endif; ?>
          <?php if(isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'admin'): ?>
          <li class="dropdown">
            <a href="config.php"><span>Configuración</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="buzon.php">Buzón</a></li>
              <li><a href="registrar.php">Registrar</a></li>
              <li><a href="usuarios.php">Usuarios</a></li>
              <li><a href="ayuda_admin.php">Ayuda Admin</a></li>
            </ul>
          </li>
          <?php endif; ?>
          <?php if(isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'docente' OR 'estudiante'): ?>
          <li><a href="ayuda.php">Ayuda</a></li>
          <?php endif; ?>
          <li><a href="logout.php" class="active">Cerrar Sesión</a></li>
          <div class="user-info d-flex align-items-center">
          <i class="bi bi-person-circle fs-4 me-2"></i>
          <div>
            <strong><?php echo htmlspecialchars($usuario); ?></strong>
            <div class="user-role text-secondary small text-capitalize">
              <?php echo htmlspecialchars($rol); ?>
            </div>
          </div>
        </div>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
    </div>
  </header>