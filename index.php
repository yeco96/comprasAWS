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
      <a class="navbar-brand" href="#">Ferretería Caramel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          
        </ul>
      </div>
    </div>
  </nav>


  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Iniciar Sesión</h5>
            <form class="form-signin" id="frmLogin" name="frmLogin" method="post">
              <div class="form-label-group">
                <input type="text" id="inputEmail" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
                <label for="inputEmail">Usuario</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Contraseña" required>
                <label for="inputPassword">Contraseña</label>
              </div>
              <input type="hidden" name="accion" value="login" /><br>
             <input type="button" class="btn btn-lg btn-primary btn-block text-uppercase" id="btnLogin" name="Login" value="Ingresar" />

              <hr class="my-4">

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>