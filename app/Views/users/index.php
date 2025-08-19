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
                        placeholder="Search">
                    </div>
                    <div class="col-auto">
                      <button type="submit" class="btn app-btn-secondary">Buscar</button>
                    </div>
                  </form>

                </div>
                <!--//col-->
                <div class="col-auto">

                  <select class="form-select w-auto">
                    <option selected value="option-1">Todo</option>
                    <option value="option-2">Esta Semana</option>
                    <option value="option-3">Este Mes</option>
                    <option value="option-4">Ultimos 3 Meses</option>

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
              </div>
              <!--//row-->
            </div>
            <!--//table-utilities-->
          </div>
          <!--//col-auto-->
        </div>
        <!--//row-->

        <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
          <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab"
            href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Todo</a>
          <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid"
            role="tab" aria-controls="orders-paid" aria-selected="false">Activos</a>
          <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab"
            href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Inactivos</a>
          <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab"
            href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Cancelados</a>
        </nav>

        <div class="tab-content" id="orders-table-tab-content">
          <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
              <div class="app-card-body">
                <div class="table-responsive">
                  <table class="table app-table-hover mb-0 text-left">
                    <thead>
                      <tr>
                        <th class="cell">ID</th>
                        <th class="cell">Nombre</th>
                        <th class="cell">Email</th>
                        <th class="cell">Rol</th>
                        <th class="cell">Sucursal</th>
                        <th class="cell">Estatus</th>
                        <th class="cell"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($usuarios)): ?>
                      <?php foreach($usuarios as $usuario): ?>
                      <tr>
                        <td class="cell"><?= $usuario['FIUSUARIOID']; ?></td>
                        <td class="cell"><span class="truncate"><?= $usuario['FCNOMBREUSUARIO'] . ' ' . $usuario['FCAPELLIDOPATERNO'] . ' ' . $usuario['FCAPELLIDOMATERNO']; ?></span>
                        </td>
                        <td class="cell"><?= $usuario['FCEMAIL']; ?></td>
                        <td class="cell"><?= $usuario['FCNOMBREROL']; ?></td>
                        <td class="cell"><?= $usuario['FCNOMBRESUCURSAL']; ?></td>
                        <td class="cell">
                          <span class="badge <?php echo $usuario['FIESTATUS'] == 0 ? 'bg-danger' : ($usuario['FIESTATUS'] == 1 ? 'bg-success' : 'bg-warning'); ?>">
                            <?php echo $usuario['FIESTATUS'] == 0 ? 'Eliminado' : ($usuario['FIESTATUS'] == 1 ? 'Activo' : 'Inactivo'); ?>
                          </span>
                        </td>
                        <td class="cell">
                          <button type="button" class="btn-sm app-btn-secondary" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Detalles
                          </button>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
                <!--//table-responsive-->

              </div>
              <!--//app-card-body-->
            </div>
            <!--//app-card-->
            <nav class="app-pagination">
              <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Next</a>
                </li>
              </ul>
            </nav>
            <!--//app-pagination-->

          </div>
          <!--//tab-pane-->

          <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
            <div class="app-card app-card-orders-table mb-5">
              <div class="app-card-body">
                <div class="table-responsive">

                  <table class="table mb-0 text-left">
                    <thead>
                      <tr>
                        <th class="cell">ID</th>
                        <th class="cell">Nombre</th>
                        <th class="cell">Email</th>
                        <th class="cell">Rol</th>
                        <th class="cell">Sucursal</th>
                        <th class="cell">Estatus</th>
                        <th class="cell"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="cell">#0000001</td>
                        <td class="cell"><span class="truncate">Rogelio Espinosa Reyes</span></td>
                        <td class="cell">respinosa@koomersys.com</td>
                        <td class="cell">Administrador</td>
                        <td class="cell"><span>Congreso</span><span class="note">La Ventanita E.</span></td>
                        <td class="cell"><span class="badge bg-success">Avtivo</span></td>
                        <td class="cell"><a class="btn-sm app-btn-secondary" href="#">Detalles</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!--//table-responsive-->
              </div>
              <!--//app-card-body-->
            </div>
            <!--//app-card-->
          </div>
          <!--//tab-pane-->

          <div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
            <div class="app-card app-card-orders-table mb-5">
              <div class="app-card-body">
                <div class="table-responsive">
                  <table class="table mb-0 text-left">
                    <thead>
                      <tr>
                        <th class="cell">ID</th>
                        <th class="cell">Nombre</th>
                        <th class="cell">Email</th>
                        <th class="cell">Rol</th>
                        <th class="cell">Sucursal</th>
                        <th class="cell">Estatus</th>
                        <th class="cell"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="cell">#0000002</td>
                        <td class="cell"><span class="truncate">Paulina Mayte Sanchez Vega</span></td>
                        <td class="cell">pmsanchez@koomersys.com</td>
                        <td class="cell">Gerente</td>
                        <td class="cell"><span>Cuajimalpa</span><span class="note">Naturista Gray</span></td>
                        <td class="cell"><span class="badge bg-warning">Suspendido</span></td>
                        <td class="cell"><a class="btn-sm app-btn-secondary" href="#">Detalles</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!--//table-responsive-->
              </div>
              <!--//app-card-body-->
            </div>
            <!--//app-card-->
          </div>
          <!--//tab-pane-->
          <div class="tab-pane fade" id="orders-cancelled" role="tabpanel" aria-labelledby="orders-cancelled-tab">
            <div class="app-card app-card-orders-table mb-5">
              <div class="app-card-body">
                <div class="table-responsive">
                  <table class="table mb-0 text-left">
                    <thead>
                      <tr>
                        <th class="cell">ID</th>
                        <th class="cell">Nombre</th>
                        <th class="cell">Email</th>
                        <th class="cell">Rol</th>
                        <th class="cell">Sucursal</th>
                        <th class="cell">Estatus</th>
                        <th class="cell"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="cell">#0000003</td>
                        <td class="cell"><span class="truncate">Adela Reyes Olvera</span></td>
                        <td class="cell">areyes@koomersys.com</td>
                        <td class="cell">Cajera</td>
                        <td class="cell"><span>Congreso</span><span class="note">La Ventanita E.</span></td>
                        <td class="cell"><span class="badge bg-danger">Eliminado</span></td>
                        <td class="cell">
                          <a class="btn-sm app-btn-secondary" href="#">Detalles</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!--//table-responsive-->
              </div>
              <!--//app-card-body-->
            </div>
            <!--//app-card-->
          </div>
          <!--//tab-pane-->
        </div>
        <!--//tab-content-->
      </div>
      <!--//container-fluid-->
    </div>
    <!-- Modal -->
    <div class="modal fade modal-xl" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
      tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-primary justify-content-center">
            <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">Detalles de Usuario</h1>
          </div>
          <div class="modal-body">
            <form>
              <div class="row">
                <div class="row col-md-4">
                  <div class="mb-3">
                    <label for="Nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="Nombre" aria-describedby="emailHelp"
                      placeholder="Nombre">
                  </div>
                  <div class="mb-3">
                    <label for="correoElectronico" class="form-label">Correo Electronico</label>
                    <input type="email" class="form-control" id="correoElectronico" aria-describedby="emailHelp"
                      placeholder="Correo Electronico">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Rol</label>
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Selecciona un rol</option>
                      <option value="1">ADMINISTRADOR</option>
                      <option value="2">GERENTE</option>
                      <option value="3">VENDEDOR</option>
                    </select>
                  </div>
                </div>
                <div class="row col-md-4">
                  <div class="mb-3">
                    <label for="apellidoPaterno" class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" id="apellidoPaterno" aria-describedby="emailHelp"
                      placeholder="Apellido Paterno">
                  </div>
                  <div class="mb-3">
                    <label for="calve" class="form-label">Contraseña</label>
                    <input type="email" class="form-control" id="Clave" aria-describedby="emailHelp"
                      placeholder="Contraseña">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Sucursal</label>
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Selecciona una sucursal</option>
                      <option value="1">CONGRESO</option>
                      <option value="2">CONGRESO II</option>
                      <option value="3">TODO PARA SU PAN</option>
                    </select>
                  </div>
                </div>
                <div class="row col-md-4">
                  <div class="mb-3">
                    <label for="apellidoMaterno" class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" id="apellidoMaterno" aria-describedby="emailHelp"
                      placeholder="Apellido Materno">
                  </div>
                  <div class="mb-3">
                    <label for="confirmarClave" class="form-label">Confirmar Contraseña</label>
                    <input type="email" class="form-control" id="confirmarClave" aria-describedby="emailHelp"
                      placeholder="Confirmar Contraseña">
                  </div>
                  <div class="mb-3 form-check pt-4">
                    <label class="switch">
                      <input type="checkbox" id="exampleCheck1">
                      <span class="slider"></span>
                    </label>
                    <label class="form-check-label ms-2" for="exampleCheck1">Estatus</label>
                  </div>
                </div>
              </div>
              <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
              <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-danger text-white">Eliminar</button>
                <button type="submit" class="btn btn-primary text-white">Actualizar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--//app-content-->
    <?= view('templates/footer'); ?>
    <!--//app-footer-->
  </div>
  <!--//app-wrapper-->

  <?= view('templates/scripts'); ?>

</body>

</html>