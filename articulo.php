<?php
require './validar-acceso.php';
$nombre = $_SESSION["datos-usuario"]["nombre"];
$apellido = $_SESSION["datos-usuario"]["apellido"];
$rol = $_SESSION["datos-usuario"]["rol"];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php include './referencias.html'; ?>

    <title>Sistema de Compras</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="menu-principal.php">Ferretería Caramel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="menu-principal.php">Inicio
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <?php
                    if ($rol == "admin") {
                        ?>

                        <li class="nav-item">
                            <a class="nav-link" href="menu-usuario.php">usuario</a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href="articulo.php">articulo<span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="menu-compra.php">compra</a>
                        </li>
                    <?php
                } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="mi-perfil.php">compras</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="catalogo.php">compras</a>
                        </li>

                    <?php
                }
                ?>
                
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Usuario</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><?php echo $nombre . " " . $apellido . " (" . $rol . ")"; ?></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php">Cerrar Sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


  <!-- Page Content -->
  <div class="container">

<br>
 <div class="row">
    
    <table class="table" style="background: white">
  <thead class="oscuro">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Descripción</th>
      <th scope="col">Existencia</th>
      <th scope="col">Costo</th>
      <th scope="col">Utilidad</th>
      <th scope="col">Precio</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Atun</td>
      <td>10</td>
      <td>575</td>
      <td>20%</td>
      <td>690</td>
    </tr>
  </tbody>
</table>

  </div>
</div>
  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/style.css">

</body>

</html>
