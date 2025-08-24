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
        <div class="row g-3 mb-4 align-items-center justify-content-between">
          <div class="col-auto">
            <h1 class="app-page-title mb-0">Usuarios</h1>
          </div>
          <div class="col-auto">
            <div class="page-utilities">
              <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">
                  <form class="table-search-form row gx-1 align-items-center">
                    <div class="col-auto">
                      <input type="text" id="search-orders" name="searchorders" class="form-control search-orders"
                        placeholder="Buscar Usuario">
                    </div>
                  </form>
                </div>
                <div class="col-auto">
                  <select id="filterStatus" class="form-select w-auto">
                    <option selected value="all">Todo</option>
                    <option value="activo">Activos</option>
                    <option value="inactivo">Inactivos</option>
                    <option value="eliminado">Eliminados</option>
                  </select>
                </div>
                <!-- Selector de cantidad por página -->
                <div class="col-auto">
                  <select id="rowsPerPageSelect" class="form-select w-auto">
                    <option value="10" selected>10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select>
                </div>
                <div class="col-auto">
                  <a class="btn app-btn-secondary" href="#">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                      <path fill-rule="evenodd"
                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                    </svg>
                    Descargar CSV
                  </a>
                </div>
                <div class="col-auto">
                  <a class="btn app-btn-secondary" href="<?php echo base_url('usuarios/agregar'); ?>"
                    id="btnAgregarUsuario">
                    <svg class="bi bi-download me-1" width="1.2em" height="1.2em" fill="currentColor"
                      xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                      <path
                        d="M136 192C136 125.7 189.7 72 256 72C322.3 72 376 125.7 376 192C376 258.3 322.3 312 256 312C189.7 312 136 258.3 136 192zM48 546.3C48 447.8 127.8 368 226.3 368L285.7 368C384.2 368 464 447.8 464 546.3C464 562.7 450.7 576 434.3 576L77.7 576C61.3 576 48 562.7 48 546.3zM544 160C557.3 160 568 170.7 568 184L568 232L616 232C629.3 232 640 242.7 640 256C640 269.3 629.3 280 616 280L568 280L568 328C568 341.3 557.3 352 544 352C530.7 352 520 341.3 520 328L520 280L472 280C458.7 280 448 269.3 448 256C448 242.7 458.7 232 472 232L520 232L520 184C520 170.7 530.7 160 544 160z" />
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="app-card app-card-orders-table shadow-sm mb-5">
          <div class="app-card-body">
          </div>
          <div class="table-responsive">
            <table class="table app-table-hover mb-0 text-left" id="usuariosTable">
              <thead>
                <tr>
                  <th class="cell text-center">Marca</th>
                  <th class="cell text-center">Nombre</th>
                  <th class="cell text-center">Email</th>
                  <th class="cell text-center">Rol</th>
                  <th class="cell text-center">Sucursal</th>
                  <th class="cell text-center">Estatus</th>
                  <th class="cell text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($usuarios)): ?>
                <?php foreach ($usuarios as $usuario): 
                  $encrypter = \Config\Services::encrypter();
                  $encryptedId = bin2hex($encrypter->encrypt($usuario['FIUSUARIOID']));
                  $encrypterMarcaId = bin2hex($encrypter->encrypt($usuario['FIMARCAID']));
                ?>
                <tr>
                  <td class="cell"><?= $usuario['FCNOMBRE']; ?></td>
                  <td class="cell">
                    <span class="truncate">
                      <?= $usuario['FCNOMBREUSUARIO'] . ' ' . $usuario['FCAPELLIDOPATERNO'] . ' ' . $usuario['FCAPELLIDOMATERNO']; ?>
                    </span>
                  </td>
                  <td class="cell"><?= $usuario['FCEMAIL']; ?></td>
                  <td class="cell"><?= $usuario['FCNOMBREROL']; ?></td>
                  <td class="cell"><?= $usuario['FCNOMBRESUCURSAL']; ?></td>
                  <td class="cell">
                    <span class="badge <?php echo $usuario['FIESTATUS'] == 0 ? 'bg-danger' : ($usuario['FIESTATUS'] == 1 ? 'bg-success' : 'bg-warning'); ?>">
                      <?php echo $usuario['FIESTATUS'] == 0 ? 'Eliminado' : ($usuario['FIESTATUS'] == 1 ? 'Activo' : 'Inactivo'); ?>
                    </span>
                  </td>
                  <td class="cell text-center">
                    <?php if ($usuario['FIROLID'] == 1): ?>
                    <span class="badge bg-info"> Administrador </span>
                    <?php else: ?>
                    <a class="btn-sm app-btn-secondary" href="<?php echo base_url('usuarios/edit/' . $encryptedId . '/' . $encrypterMarcaId); ?>">
                      Detalles
                    </a>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
        <nav class="app-pagination">
          <ul class="pagination justify-content-center" id="pagination"></ul>
        </nav>
      </div>
    </div>
  </div>
  <?php echo view('templates/footer'); ?>
  </div>
  <?= view('templates/scripts'); ?>
  <script src="<?= base_url('assets/js/funciones/users/usuarios.js'); ?>"></script>
</body>

</html>