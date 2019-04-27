<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $codigoBarras = $_POST['codigoBarras'];
    $descripcion = $_POST['descripcion'];
    $utilidad = $_POST['utilidad'];
    $impuesto = $_POST['impuesto'];


    // Updaste User details
    $query = "UPDATE articulo SET codigoBarras='$codigoBarras', descripcion='$descripcion', utilidad = '$utilidad', impuesto = '$impuesto'
     WHERE codigo = '$id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}