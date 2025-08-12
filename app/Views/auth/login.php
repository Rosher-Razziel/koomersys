<!DOCTYPE html>
<html lang="en">

<head>
  <?= view('templates/header'); ?>
</head>

<body class="app app-login p-0">
  <div class="row g-0 app-auth-wrapper">
    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
      <div class="d-flex flex-column align-content-end">
        <div class="app-auth-body mx-auto">
          <div class="app-auth-branding mb-4">
            <a class="app-logo" href="<?= base_url(); ?>">
              <img id="logo-icon" src="<?= base_url('assets/images/logos/Koomersys.svg'); ?>" alt="Logo Koomersys">
            </a>
          </div>
          <!-- <h2 class="auth-heading text-center mb-5">Koomersys</h2> -->
          <div class="auth-form-container text-start">
            <form id="login-form" class="auth-form login-form">
              <div class="email mb-3">
                <label class="sr-only" for="signin-email">Correo Electronico</label>
                <input id="signin-email" name="signin-email" type="email" class="form-control signin-email"
                  placeholder="Usuario" required="required">
              </div>
              <div class="password mb-3">
                <label class="sr-only" for="signin-password">Contraseña</label>
                <input id="signin-password" name="signin-password" type="password" minlength="8" class="form-control signin-password"
                  placeholder="Contraseña" required="required">
                <div class="extra mt-3 row justify-content-between">
                  <div class="col-6">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="1" id="RememberPassword" name="RememberPassword">
                      <label class="form-check-label" for="RememberPassword">
                        No cerrar sesión
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="forgot-password text-end">
                      ¿Olvidaste tu contraseña?
                      <a href="reset-password.html">Recupera tu contraseña</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Iniciar sesión</button>
              </div>
            </form>
          </div>

        </div>
        <?= view('templates/footerAuth'); ?>
      </div>
    </div>
    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
      <div class="auth-background-holder">
      </div>
      <div class="auth-background-mask"></div>
				<?php  echo view('templates/notificacion'); ?>
    </div>
  </div>
  <script src="<?= base_url('assets/js/axios/auth.js'); ?>"></script>
</body>

</html>