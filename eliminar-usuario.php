<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Eliminar Usuario</title>
        <link href="css/eliminar.css" rel="stylesheet" type="text/css"/>
        <?php include './referencias.html'; ?>
    </head>
    <body>
        <h1 class="titulo" align="center">Eliminar usuario.</h1>
        <div class="main">
            <form class="frmEliminar" name="frmEliminarUsuario" id="frmEliminarUsuario" method="post">
                <p align="center"><input class="inputfrm" type="text" name="usuario" placeholder="Digite el usuario"></p>
                <input type="hidden" name="accion" value="eliminar-usuario"><br>
                <input type="button" name="btnEliminar" id="btnEliminar" value="Eliminar Usuario">
            </form>
        </div>
    </body>
</html>
