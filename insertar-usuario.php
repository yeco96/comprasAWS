<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insertar Usuario</title>
        <?php include './referencias.html'; ?>
        <link href="css/ingresar.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1 class="titulo" align="center">Formulario para ingresar nuevos usuarios</h1>
        <div class="main">
            <form class="frmIngresar" name="frmIngresarUsuario" id="frmIngresarUsuario" method="post">
                <p align="center"><input class="inputfrm" type="text" name="cedula" placeholder="Ingrese su cédula"></p>
                <p align="center"><input class="inputfrm" type="text" name="nombre" placeholder="Ingrese su nombre"></p>
                <p align="center"><input class="inputfrm" type="text" name="apellido" placeholder="Ingrese su apellido"></p>
                <p align="center"><input class="inputfrm" type="number" name="telefono" placeholder="Ingrese su teléfono"></p>
                <p align="center"><input class="inputfrm" type="email" name="email" placeholder="Ingrese su email"></p>
                <p align="center"><input class="inputfrm" type="text" name="usuario" placeholder="Ingrese un usuario"></p>
                <p align="center"><input class="inputfrm" type="password" name="contrasena" placeholder="Ingrese su contraseña"></p>    
                <p align="center">
                    <select class="inputfrm" name="Rol" align="center">
                        <option value="admin" >Administrador</option>
                        <option value="visit" >Visitante</option>                
                    </select></p>
                <input type="hidden" name="accion" value="ingresar-usuario">
                <input type="button" name="btnIngresar" id="btnIngresar" value="Ingresar Usuario">       
            </form>
        </div>
    </body>
</html>
