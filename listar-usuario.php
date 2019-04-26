<?php
require './Clases/ClaseUsuario.php';
$Usuario = new ClaseUsuario();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listar Usuarios</title>
        <link href="css/listar.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1 class="titulo" align="center">Lista de usuarios</h1>
        <?php
        $resultado = $Usuario->ListarUsuarios();
        if ($resultado["valido"]) {
            foreach ($resultado["usuarios"] as $usuario) {  
                echo "<div class=main>";
                echo "<p class=plistaborde align=center>=========================================</p>";
                echo "<p class=plista align=center><strong>Cedula: </strong>" . $usuario["Cedula"] . "</p>";
                echo "<p class=plista align=center><strong>Nombre: </strong>" . $usuario["Nombre"] . "</p>";
                echo "<p class=plista align=center><strong>Apellidos: </strong>" . $usuario["Apellido"] . "</p>";
                echo "<p class=plista align=center><strong>Telefono: </strong>" . $usuario["Telefono"] . "</p>";
                echo "<p class=plista align=center><strong>Email: </strong>" . $usuario["Email"] . "</p>";
                echo "<p class=plista align=center><strong>Rol: </strong>" . $usuario["Rol"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No se encontraron usuarios.</p>";
        }
        ?>
    </body>
</html>
