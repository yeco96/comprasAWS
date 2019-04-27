<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];

    // Updaste User details
    $query = "update articulo a join detalle d on a.codigo = d.codigo set a.precioVenta = (a.costo + (a.costo * (a.utilidad / 100))) + ((a.costo + (a.costo * (a.utilidad / 100))) * (a.impuesto / 100)) , a.costo = d.costo, a.existencia = (a.existencia + d.cantida)
     where d.solicitud = '$id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}