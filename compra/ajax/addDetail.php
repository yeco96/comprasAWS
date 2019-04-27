<?php

	if(isset($_POST['Codigo']) && isset($_POST['solicitud']))
	{
		// include Database connection file 
		include("db_connection.php");

		// get values 
		$Codigo = $_POST['Codigo'];
		$solicitud = $_POST['solicitud'];
		$id = "1";


		$query = "INSERT INTO detalle (solicitud, codigo, costo, cantida) 
		VALUES('$solicitud', '$Codigo', 2, 0)";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
		}
		

		$response['status'] = 200;
		$response['message'] = "Correcto";
	}else{
		$response['status'] = 400;
		$response['message'] = "Faltan Datos";
	}

	echo json_encode($response);
?>