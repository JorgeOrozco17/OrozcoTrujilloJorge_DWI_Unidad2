  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="" class="logo d-flex align-items-center">
            <span class="sitename">DwCursor</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Av. Segunda #92092, Col. Centro</p>
            <p>Ramos Arizpe, Coah</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+52 8440000001</span></p>
            <p><strong>Email:</strong> <span>info@dwcursor.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Mapa de sitio</h4>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php#about">Sobre nosotros</a></li>
            <li><a href="login.php">Iniciar Sesion</a></li>
            <li><a href="registro.php">Registrarte</a></li>
            <li><a href="recuperar.php">Olvide mi contraseña</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Cursos</h4>
          <ul>
            <li><a href="index.php">Cursos</a></li>
            <li><a href="index.php#about">Mis cursos</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4> Configuracion</h4>
          <ul>
            <li><a href="buzon.php">Buzon</a></li>
            <li><a href="registrar.php">Registrar</a></li>
            <li><a href="ayuda_admin.php">Panel de soportes</a></li>
            <li><a href="usuarios.php">Usuarios</a></li>
          </ul>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Pusho</strong> <span>All Rights Reserved</span></p>
    </div>

  </footer>


  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <div id="preloader"></div>


  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/mdb-ui-kit@6.4.2/js/mdb.min.js"></script>
  <script src="assets/plugins/global/plugins.bundle.js"></script>
  <script src="assets/js/scripts.bundle.js"></script>

  <!-- DataTables + Bootstrap 5 integration JS -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

  <script src="assets/js/main.js"></script>

  <script>
    $(document).ready(function () {
    $('#tablaComun').DataTable({
        pageLength: 10,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        },
        responsive: true
    });
});
  </script>

</body>

</html>