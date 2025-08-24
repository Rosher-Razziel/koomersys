<!DOCTYPE html>
<html lang="es">

<head>
  <?= view('templates/header'); ?>
  <style>

  </style>
</head>

<body class="app app-403-page">

  <div class="container mb-5">
    <div class="row">
      <div class="col-12 col-md-11 col-lg-7 col-xl-6 mx-auto">
        <div class="app-branding text-center mb-5">
          <a class="app-logo" href="<?= base_url(); ?>">
            <img class="logo-icon me-2" src="<?= base_url('assets/images/logos/logo-koomersys-v2.svg'); ?>" alt="logo">
            <span class="logo-text">Koomersys</span>
          </a>
        </div>
        <!--//app-branding-->

        <div class="app-card p-5 text-center shadow-sm">

          <!-- SVG Acceso Denegado -->
          <svg class="access-denied-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="1.5">
            <circle cx="12" cy="12" r="10" stroke="#dc3545" stroke-width="2" fill="none" />
            <line x1="6" y1="6" x2="18" y2="18" stroke="#dc3545" stroke-width="2" />
          </svg>

          <h1 class="page-title mb-4 access-denied">403<br><span class="font-weight-light">Acceso Denegado</span></h1>

          <div class="mb-4">
            Lo sentimos, no tienes permisos para acceder a esta página.
          </div>

          <a class="btn btn-danger" href="<?= base_url(); ?>">Ir al Inicio</a>
        </div>
      </div>
      <!--//col-->
    </div>
    <!--//row-->
  </div>
  <!--//container-->

  <?php view('templates/footer'); ?>
  <?php view('templates/scripts'); ?>
</body>

</html>