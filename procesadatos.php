<?php

include './Clases/ClaseUsuario.php';
$Usuario = new ClaseUsuario();

$accion = $_POST["accion"];
$datos = $_POST;

switch ($accion) {
    case "login":
        $resultado = $Usuario->Login($datos);
        break;

    case "ingresar-usuario":
        $resultado = $Usuario->IngresarUsuario($datos);
        break;

    case "eliminar-usuario":
        $resultado = $Usuario->EliminarUsuario($datos);
        break;

    case "actualizar-usuario":
        $resultado = $Usuario->ActualizarUsuario($datos);
        break;

    case "buscar-usuario":
        $resultado = $Usuario->BuscaUsuario($datos);
        break;
    
    case "cerrar-sesion":
        session_start();
        session_destroy();
        $resultado = array();
        $resultado["valido"] = true;
        break;
}
echo json_encode($resultado);
