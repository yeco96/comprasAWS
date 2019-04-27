<?php

	if(isset($_POST['numeroFactura']))
	{
		// include Database connection file 
		include("db_connection.php");

		// get values 
		$numeroFactura = $_POST['numeroFactura'];
		$id = "1";


		$query = "INSERT INTO compra (numeroFactura, fechaRegistro, cedulaUsuario, totalCompra) 
		VALUES('$numeroFactura', now(), '$id', 0)";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
		}
		

		$query = "SELECT * FROM compra WHERE numeroFactura = '$numeroFactura'";
		if (!$result = mysqli_query($con, $query)) {
			exit(mysqli_error($con));
		}
		$response = array();

		if(mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$response = $row;
			}


			$response['status'] = 200;
			$response['message'] = "Correcto";
		}
		else
		{
			$response['status'] = 400;
			$response['message'] = "La compra no existe";
		}

	
	}else{
		$response['status'] = 400;
		$response['message'] = "Faltan Datos";
	}

	echo json_encode($response);
?>