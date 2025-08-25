<!DOCTYPE html>
<html lang="es">

<head>
  <?= view('templates/header'); ?>
</head>

<body class="app">
  <header class="app-header fixed-top">
    <?= view('templates/nav'); ?>
    <?= view('templates/sidebar'); ?>
  </header>

  <div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
      <div class="container-xl">
        <div class="row g-3 mb-4">
          <div class="col-auto">
            <div class="page-utilities">
              <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">
                  <a class="btn app-btn-secondary" href="<?php echo base_url('usuarios'); ?>" id="btnAgregarUsuario">
                    <svg width="1em" height="1em" class="bi bi-download me-1" fill="currentColor"
                      xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                      <path
                        d="M169.4 297.4C156.9 309.9 156.9 330.2 169.4 342.7L361.4 534.7C373.9 547.2 394.2 547.2 406.7 534.7C419.2 522.2 419.2 501.9 406.7 489.4L237.3 320L406.6 150.6C419.1 138.1 419.1 117.8 406.6 105.3C394.1 92.8 373.8 92.8 361.3 105.3L169.3 297.3z" />
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <h1 class="app-page-title mb-0">Agregar Nuevo Usuarios
              <?php //print_r($usuario); //echo"-------------------"; print_r($roles); echo "------------------"; print_r($sucursales); ?>
            </h1>
          </div>
        </div>
        <div class="app-card app-card-orders-table shadow-sm mb-5">
          <div class="app-card-body">
          </div>
          <div class="table-responsive">
            <div class="table-responsive">
              <form class="p-4 bg-light rounded shadow-sm">
                <!-- <h5 class="mb-4">Editar Usuario</h5> -->

                <div class="row g-3">
                  <!-- Marca -->
                  <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                    <label for="fimarcaid" class="form-label text-black">Marca</label>
                    <select class="form-select" id="fimarcaid" name="FIMARCAID" required>
                      <?php foreach ($marcas as $marca): ?>
                      <option value="<?= esc($marca['FIMARCAID']) ?>">
                        <?= esc($marca['FCNOMBRE']) ?>
                      </option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <!-- Sucursal -->
                  <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                    <label for="fisucursalid" class="form-label text-black">Sucursal</label>
                    <select class="form-select" id="fisucursalid" name="FISUCURSALID" required>
                      <?php foreach ($sucursales as $sucursal): ?>
                      <option value="<?= esc($sucursal['FISUCURSALID']) ?>">
                        <?= esc($sucursal['FCNOMBRESUCURSAL']) ?>
                      </option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <!-- Nombre -->
                  <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                    <label for="fcnombreusuario" class="form-label text-black">Nombre</label>
                    <input type="text" class="form-control" id="fcnombreusuario" name="FCNOMBREUSUARIO"
                      placeholder="Ingrese el nombre" required>
                  </div>

                  <!-- Apellido Paterno -->
                  <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                    <label for="fcapellidopaterno" class="form-label text-black">Apellido Paterno</label>
                    <input type="text" class="form-control" id="fcapellidopaterno" name="FCAPELLIDOPATERNO"
                      placeholder="Ingrese el apellido paterno" required>
                  </div>

                  <!-- Apellido Materno -->
                  <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                    <label for="fcapellidomaterno" class="form-label text-black">Apellido Materno</label>
                    <input type="text" class="form-control" id="fcapellidomaterno" name="FCAPELLIDOMATERNO"
                      placeholder="Ingrese el apellido materno" required>
                  </div>

                  <!-- Numero Telefonico -->
                  <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                    <label for="fcnumerotelefonico" class="form-label text-black">Numero Telefonico</label>
                    <input type="text" class="form-control" id="fcnumerotelefonico" name="FCNUMEROTELEFONICO"
                      placeholder="Numero telefonico" required>
                  </div>

                  <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                    <label for="fcapellidomaterno" class="form-label text-black">Correo Electronico</label>
                    <input type="text" class="form-control" id="fcapellidomaterno" name="FCEMAIL"
                      placeholder="ejemplo@marca.com" reqiored>
                  </div>

                  <!-- Rol -->
                  <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                    <label for="firolid" class="form-label text-black">Rol</label>
                    <select class="form-select" id="firolid" name="FIROLID" required>
                      <?php foreach ($roles as $rol): ?>
                      <?php if ($rol['FIROLID'] != 1) { ?>
                      <option value="<?= esc($rol['FIROLID']) ?>">
                        <?= esc($rol['FCNOMBREROL']) ?>
                      </option>
                      <?php } ?>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <!-- Clave -->
                  <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                    <label for="fcclave" class="form-label text-black">Clave</label>
                    <input type="password" class="form-control" id="fcclave" name="FCCLAVE" placeholder="Contraseaña"
                      required>
                  </div>

                  <!-- Confirmar Clave -->
                  <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                    <label for="fcconfirmarclave" class="form-label text-black">Confirmar Clave</label>
                    <input type="password" class="form-control" id="fcconfirmarclave" name="FCCONFIRMARCLAVE"
                      placeholder="Contraseña" required>
                  </div>

                  <!-- Confirmar Clave -->
                  <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                    <label for="fcconfirmarclave" class="form-label text-black">Estatus</label>
                    <select class="form-select" id="fimarcaid" name="FIMARCAID" required>
                      <option value="">Activo</option>
                      <option value="">Inactivo</option>
                    </select>
                  </div>

                </div>
                <!-- Botones -->
                <div class="mt-4 d-flex justify-content-end">
                  <button type="reset" class="btn btn-secondary me-2">Cancelar</button>
                  <button type="submit" class="btn btn-primary text-white">Guardar</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
    <?= view('templates/footer'); ?>
    <!-- Modal -->
  </div>
  <?= view('templates/scripts'); ?>
  <script src="<?= base_url('assets/js/funciones/users/agregar.js'); ?>"></script>
</body>

</html>