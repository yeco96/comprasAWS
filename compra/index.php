<?php
require '../validar-accesoCrud.php';
$nombre = $_SESSION["datos-usuario"]["nombre"];
$apellido = $_SESSION["datos-usuario"]["apellido"];
$rol = $_SESSION["datos-usuario"]["rol"];
?>

<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sistema de Compras</title>
  <?php include '../referenciasCrud.html'; ?>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="menu-principal.php">Ferretería Caramel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="../menu-principal.php">Inicio

              </a>
            </li>

            <?php
            if ($rol == "admin") {
              ?>

              <li class="nav-item">
                <a class="nav-link" href="../menu-usuario.php">usuario</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../articulo/index.php">articulo</a>
              </li>

              <li class="nav-item active">
                <a class="nav-link" href="../compra/index.php">compra <span class="sr-only">(current)</span></a>
              </li>
            <?php
          } else {
            ?>
              <li class="nav-item active">
                <a class="nav-link" href="../compra/index.php">compras <span class="sr-only">(current)</span></a>
              </li>

            <?php
          }
          ?>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Usuario</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#"><?php echo $nombre . " (" . $rol . ")"; ?></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../cerrar.php">Cerrar Sesión</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>


  <!-- Begin page content -->

  <input type="hidden" id="numCompra">

  <div class="container">

    <br>
    <div class="row">
      <div class="col-12 col-md-12">
        <!-- Contenido -->

        <!-- Content Section -->
        <!-- crud jquery-->
        <div class="">
          <div class="row">
            <div class="col-md-8">
              <div class="pull-right">
                <button class="btn btn-success" id="btniniciar" data-toggle="modal" data-target="#add_new_record_modal">Iniciar Compra</button>
                <button class="btn btn-info" id="btndetalle" data-toggle="modal" data-target="#add_new_detail_modal">Agregar Detalle</button>
              </div>


            </div>
            <div class="col-md-3">
              <input type="text" disabled id="numeroFacturaTemp" maxlength="13" value="" class="form-control" />

            </div>
            <div class="col-md-1">
              <button type="button" id="btnfacturar" class="btn btn-warning" onclick="UpdateUserDetails()">Facturar</button>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <div id="records_content"></div>
            </div>
          </div>
        </div>
        <!-- /Content Section -->

        <!-- Bootstrap Modals -->
        <!-- Modal - Add New Record/User -->
        <div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title">Factura Provedor </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <div class="form-group">
                  <label for="numeroFactura">Numero Factura</label>
                  <input type="text" id="numeroFactura" maxlength="13" value="" class="form-control" />
                </div>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addRecord()">Inicar</button>
              </div>
            </div>
          </div>
        </div>
        <!-- // Modal -->


        <div class="modal fade" id="add_new_detail_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title">articulo </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <div class="form-group">
                  <label for="codigo">Codigo</label>
                  <div class="input-group mb-3">
                    <input type="number" id="codigo" maxlength="13" value="" class="form-control">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" onclick="getArticulo()" >Buscar</button>
                    </div>
                  </div>

                </div>

                <div class="form-group">
                  <label for="articulo_descripcion">Descripción</label>
                  <input type="text" id="articulo_descripcion" style=" text-transform: uppercase;" disabled maxlength="13" value="" class="form-control" />
                </div>

                <div class="form-group">
                  <label for="costo">Costo</label>
                  <input type="number" id="costo" maxlength="13" value="" class="form-control" />
                </div>

                <div class="form-group">
                  <label for="cantidad">Cantidad</label>
                  <input type="number" id="cantidad" maxlength="13" value="" class="form-control" />
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addDetail()">Inicar</button>
              </div>
            </div>
          </div>
        </div>


        <!-- Modal - Update User details -->
        <div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title">Actualizar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>


              <div class="modal-body">

                <div class="form-group">
                  <label for="update_codigoBarras">Codigo de Barras</label>
                  <input type="text" id="update_codigoBarras" value="" class="form-control" />
                </div>
                <div class="form-group">
                  <label for="update_descripcion">Descripción</label>
                  <input type="text" id="update_descripcion" value="" class="form-control" />
                </div>
                <div class="form-group">
                  <label for="update_utilidad">Utilidad</label>
                  <input type="number" id="update_utilidad" class="form-control" value="" />
                </div>

                <div class="form-group">
                  <label for="update_impuesto">Impuesto</label>
                  <select id="update_impuesto" class="form-control">
                    <option value="0">0 %</option>
                    <option value="1">1 %</option>
                    <option value="3">3 %</option>
                    <option value="4">4 %</option>
                    <option value="13">13 %</option>
                  </select>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()">Guardar Cambios</button>
                <input type="hidden" id="hidden_user_id">
              </div>
            </div>
          </div>
        </div>
        <!-- // Modal -->

        <!-- Inicio crud jquery -->
        <script type="text/javascript" src="js/script.js"></script>
        <!-- Fin crud jquery-->



        <!-- Fin Contenido -->
      </div>
    </div>
    <!-- Fin row -->

  </div>

</body>

</html>