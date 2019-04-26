<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar Usuario</title>
        <?php include './referencias.html'; ?>
        <link href="css/buscar.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1 class="titulo" align="center">Actualizar Usuario</h1>
        <div class="main">
            <form class="frmBusqueda" name="frmBusqueda" id="frmBusqueda" method="post">
                <input class="inputfrm" type="text" name="usuario_busqueda" placeholder="Dígete el usuario">
                <input type="hidden" name="accion" value="buscar-usuario">
                <input type="button" name="btnBuscar" id="btnBuscar" value="Buscar">
            </form>
        </div>
        <div class="contenedor"></div>
    </body>
</html>
