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
            <h1 class="app-page-title mb-0">Editar Usuarios
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
                  <!-- Nombre -->
                  <div class="col-md-4">
                    <label for="fcnombreusuario" class="form-label text-black">Nombre</label>
                    <input type="text" class="form-control" id="fcnombreusuario" name="FCNOMBREUSUARIO"
                      placeholder="Ingrese el nombre"
                      value="<?= old('FCNOMBREUSUARIO', esc($usuario['FCNOMBREUSUARIO'] ?? '')) ?>">
                  </div>

                  <!-- Apellido Paterno -->
                  <div class="col-md-4">
                    <label for="fcapellidopaterno" class="form-label text-black">Apellido Paterno</label>
                    <input type="text" class="form-control" id="fcapellidopaterno" name="FCAPELLIDOPATERNO"
                      placeholder="Ingrese el apellido paterno"
                      value="<?= old('FCAPELLIDOPATERNO', esc($usuario['FCAPELLIDOPATERNO'] ?? '')) ?>">
                  </div>

                  <!-- Apellido Materno -->
                  <div class="col-md-4">
                    <label for="fcapellidomaterno" class="form-label text-black">Apellido Materno</label>
                    <input type="text" class="form-control" id="fcapellidomaterno" name="FCAPELLIDOMATERNO"
                      placeholder="Ingrese el apellido materno"
                      value="<?= old('FCAPELLIDOMATERNO', esc($usuario['FCAPELLIDOMATERNO'] ?? '')) ?>">
                  </div>

                  <div class="col-md-4">
                    <label for="fcapellidomaterno" class="form-label text-black">Correo Electronico</label>
                    <input type="text" class="form-control" id="fcapellidomaterno" name="FCEMAIL"
                      placeholder="ejemplo@marca.com" value="<?= old('FCEMAIL', esc($usuario['FCEMAIL'] ?? '')) ?>">
                  </div>

                  <!-- Rol -->
                  <div class="col-md-4">
                    <label for="firolid" class="form-label text-black">Rol</label>
                    <select class="form-select" id="firolid" name="FIROLID">
                      <?php foreach ($roles as $rol): ?>
                      <?php if ($rol['FIROLID'] != 1) { ?>
                        <option value="<?= esc($rol['FIROLID']) ?>"
                          <?= old('FIROLID', $usuario['FIROLID']) == $rol['FIROLID'] ? 'selected' : '' ?>>
                          <?= esc($rol['FCNOMBREROL']) ?>
                        </option>
                      <?php } ?>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <!-- Sucursal -->
                  <div class="col-md-4">
                    <label for="fisucursalid" class="form-label text-black">Sucursal</label>
                    <select class="form-select" id="fisucursalid" name="FISUCURSALID">
                      <?php foreach ($sucursales as $sucursal): ?>
                      <option value="<?= esc($sucursal['FISUCURSALID']) ?>"
                        <?= old('FISUCURSALID', $usuario['FISUCURSALID']) == $sucursal['FISUCURSALID'] ? 'selected' : '' ?>>
                        <?= esc($sucursal['FCNOMBRESUCURSAL']) ?>
                      </option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <!-- Estatus -->
                  <div class="col-md-4">
                    <label for="fiestatus" class="form-label text-black">Estatus</label>
                    <select class="form-select" id="fiestatus" name="FIESTATUS">
                      <option value="0" <?= $usuario['FIESTATUS'] == 0 ? 'selected' : '' ?>>Elininado</option>
                      <option value="1" <?= $usuario['FIESTATUS'] == 1 ? 'selected' : '' ?>>Activo</option>
                      <option value="2" <?= $usuario['FIESTATUS'] == 2 ? 'selected' : '' ?>>Inactivo</option>
                    </select>
                  </div>

                  <!-- Email verificado -->
                  <div class="col-md-4">
                    <label for="fiemailverificado" class="form-label text-black">Email Verificado</label>
                    <select class="form-select" id="fiemailverificado" name="FIEMAILVERIFICADO">
                      <option value="1" <?= $usuario['FIEMAILVERIFICADO'] == 1 ? 'selected' : '' ?>>Sí</option>
                      <option value="0" <?= $usuario['FIEMAILVERIFICADO'] == 0 ? 'selected' : '' ?>>No</option>
                    </select>
                  </div>

                  <!-- Fecha Alta -->
                  <div class="col-md-4">
                    <label for="fdfechaalta" class="form-label text-black text-black">Fecha de Alta</label>
                    <input type="text" class="form-control" id="fdfechaalta" disabled name="FDFECHAALTA"
                      value="<?= old('FDFECHAALTA', esc($usuario['FDFECHAALTA'] ?? '')) ?>">
                  </div>

                  <!-- Fecha Actualización -->
                  <div class="col-md-4">
                    <label for="fdfechaactualizacion" class="form-label text-black text-black">Fecha de
                      Actualización</label>
                    <input type="text" class="form-control" id="fdfechaactualizacion" disabled
                      name="FDFECHAACTUALIZACION"
                      value="<?= old('FDFECHAACTUALIZACION', esc($usuario['FDFECHAACTUALIZACION'] ?? '')) ?>">
                  </div>
                </div>

                <!-- Botones -->
                <div class="mt-4 d-flex justify-content-end ">
                  <button type="reset" class="btn btn-secondary me-2">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
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
  <script src="<?= base_url('assets/js/funciones/users/editar.js'); ?>"></script>
</body>

</html>