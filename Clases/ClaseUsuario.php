<?php

class ClaseUsuario {
    /* ATRIBUTOS */

    private $IdUsuario;
    private $Cedula;
    private $Nombre;
    private $Apellido;
    private $Telefono;
    private $Email;
    private $Usuario;
    private $Contrasena;
    private $Rol;

    /* CONSTRUCTOR */

    function __construct() {
        $this->IdUsuario = "";
        $this->Cedula = "";
        $this->Nombre = "";
        $this->Apellido = "";
        $this->Telefono = "";
        $this->Email = "";
        $this->Usuario = "";
        $this->Contrasena = "";
        $this->Rol = "";
    }

    /* METODOS DE LA CLASE */

    function getIdUsuario() {
        return $this->IdUsuario;
    }

    function getCedula() {
        return $this->Cedula;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getApellido() {
        return $this->Apellido;
    }

    function getTelefono() {
        return $this->Telefono;
    }

    function getEmail() {
        return $this->Email;
    }

    function getUsuario() {
        return $this->Usuario;
    }

    function getContrasena() {
        return $this->Contrasena;
    }

    function getRol() {
        return $this->Rol;
    }

    function setIdUsuario($IdUsuario) {
        $this->IdUsuario = $IdUsuario;
    }

    function setCedula($Cedula) {
        $this->Cedula = $Cedula;
    }

    function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    function setApellido($Apellido) {
        $this->Apellido = $Apellido;
    }

    function setTelefono($Telefono) {
        $this->Telefono = $Telefono;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }

    function setUsuario($Usuario) {
        $this->Usuario = $Usuario;
    }

    function setContrasena($Contrasena) {
        $this->Contrasena = $Contrasena;
    }

    function setRol($Rol) {
        $this->Rol = $Rol;
    }

    /* METODOS PROPIOS */

//Funcion Login
    function Login($datos) {
        require './conexion/bdferre.php';

        $retorno = array();

        $sql = "SELECT * FROM usuarios WHERE Usuario='" . $datos["usuario"] . "'";
        $sql .= " AND Contrasena='" .md5($datos["password"]) . "'";
        $resultado = $mysql->query($sql);

        if ($resultado->num_rows > 0) {
            $retorno["valido"] = true;
            session_start();
            $usuarios = $resultado->fetch_assoc();
            $_SESSION["datos-usuario"] = array(
                "idusuario" => $usuarios["IdUsuario"],
                "cedula" => $usuarios["Cedula"],
                "nombre" => $usuarios["Nombre"],
                "apellido" => $usuarios["Apellido"],
                "telefono" => $usuarios["Telefono"],
                "email" => $usuarios["Email"],
                "usuario" => $usuarios["Usuario"],
                "contrasena" => $usuarios["Contrasena"],
                "rol" => $usuarios["Rol"]
            );
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

    //Ingresar usuarios

    function IngresarUsuario($datos) {
        require './conexion/bdferre.php';
        $retorno = array();

        $sql = "INSERT INTO usuarios(Cedula,Nombre,Apellido,Telefono,Email,Usuario,Contrasena,Rol) VALUES (";
        $sql .= "'" . $datos["cedula"] . "','" . $datos["nombre"] . "','" . $datos["apellido"] . "',";
        $sql .= "'" . $datos["telefono"] . "','" . $datos["email"] . "','" . $datos["usuario"] . "',";
        $sql .= "'" . md5($datos["contrasena"]) . "','" . $datos["Rol"] . "')";
        //echo $sql;
        $resultado = $mysql->query($sql);
        $id = $mysql->insert_id;

        if ($id > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

    //Eliminar usuarios
    function EliminarUsuario($datos) {
        require './conexion/bdferre.php';
        $retorno = array();

        $sql = "DELETE FROM usuarios WHERE Usuario='" . $datos["usuario"] . "'";

        $resultado = $mysql->query($sql);

        if ($mysql->affected_rows > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

    //Actualizar Usuario
    function ActualizarUsuario($datos) {
        require './conexion/bdferre.php';
        $retorno = array();

        $sql = "UPDATE usuarios SET ";
        $sql .= " cedula='" . $datos["cedula"] . "',";
        $sql .= " nombre='" . $datos["nombre"] . "',";
        $sql .= " apellido='" . $datos["apellido"] . "',";
        $sql .= " telefono='" . $datos["telefono"] . "',";
        $sql .= " email='" . $datos["email"] . "'";
        $sql .= " WHERE usuario='" . $datos["usuario_busqueda"] . "'";

        $resultado = $mysql->query($sql);

        if ($mysql->affected_rows > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

    //Buscar Usuario
    function BuscaUsuario($datos) {
        require './conexion/bdferre.php';
        $retorno = array();

        $sql = "SELECT * FROM usuarios WHERE Usuario='" . $datos["usuario_busqueda"] . "'";

        $resultado = $mysql->query($sql);
        if ($resultado->num_rows > 0) {
            $retorno["valido"] = true;
            $retorno["usuario"] = $this->Formulario($resultado->fetch_assoc());
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

    //Formulario
    function Formulario($datos_usuario) {
        $form = '<form name="frmActualizarUsuario" id="frmActualizarUsuario" method="post">';
        $form .= '<p align="center"><input class="inputfrm" type="text" name="cedula" value="' . $datos_usuario["Cedula"] . '"></p>';
        $form .= '<p align="center"><input class="inputfrm" type="text" name="nombre" value="' . $datos_usuario["Nombre"] . '"></p>';
        $form .= '<p align="center"><input class="inputfrm" type="text" name="apellido" value="' . $datos_usuario["Apellido"] . '"></p>';
        $form .= '<p align="center"><input class="inputfrm" type="text" name="telefono" value="' . $datos_usuario["Telefono"] . '"></p>';
        $form .= '<p align="center"><input class="inputfrm" type="email" name="email" value="' . $datos_usuario["Email"] . '"></p>';
        $form .= '<p align="center"><input class="inputfrm" type="hidden" name="accion" value="actualizar-usuario"></p>';
        $form .= '<p align="center"><input class="inputfrm" type="hidden" name="usuario_busqueda" value="' . $datos_usuario["Usuario"] . '"></p>';
        $form .= '<p align="center"><input class="inputfrm" type="button" name="btnActualizar" id="btnActualizar" value="Actualizar">';
        $form .= '</form>';
        return $form;
    }
    
    //Listar Usuarios
    function ListarUsuarios() {
        require './conexion/bdferre.php';
        $retorno = array();

        $sql = "SELECT * FROM usuarios";

        $resultado = $mysql->query($sql);

        if ($resultado->num_rows > 0) {
            $retorno["valido"] = true;
            $usuarios = array();
            while ($usuario = $resultado->fetch_assoc()) {
                array_push($usuarios, $usuario);
            }
            $retorno["usuarios"] = $usuarios;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }
}
