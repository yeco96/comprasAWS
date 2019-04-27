<?php



	if(isset($_POST['codigoBarras']) && isset($_POST['descripcion']) && isset($_POST['utilidad']) && isset($_POST['impuesto']))
	{
		// include Database connection file 
		include("db_connection.php");

		// get values 
		$codigoBarras = $_POST['codigoBarras'];
		$descripcion = $_POST['descripcion'];
		$utilidad = $_POST['utilidad'];
		$impuesto = $_POST['impuesto'];

		$query = "INSERT INTO articulo(codigoBarras, descripcion, costo, utilidad, impuesto, precioVenta, existencia) 
		VALUES('$codigoBarras', '$descripcion', 0, '$utilidad', '$impuesto', 0, 0)";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo "1 Record Added!";
	}else{
		echo "Faltan Datos";
	}
?>