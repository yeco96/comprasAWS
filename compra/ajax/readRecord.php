<?php
// include Database connection file 
include("db_connection.php");

// Design initial table header 
$data = '
<div class="container">   <div class="table-responsive">	
<table class="table table-sm table-bordered table-striped">
						<tr>
							<th>Codigo</th>
							<th style="width:20%">Descripción</th>
							<th>Costo</th>
							<th>Cantidad</th>
							
							<th></th>
						</tr>';

if (isset($_POST['id']) && isset($_POST['id']) != "") {

	$user_id = $_POST['id'];
} else {
	$user_id  = "0";
}




$query = "SELECT detalle.*, articulo.descripcion FROM detalle, articulo WHERE detalle.codigo = articulo.codigo
and solicitud = " . $user_id . "";

if (!$result = mysqli_query($con, $query)) {
	exit(mysqli_error($con));
}

// if query results contains rows then featch those rows 
if (mysqli_num_rows($result) > 0) {
	$number = 1;
	while ($row = mysqli_fetch_assoc($result)) {
		$data .= '<tr>
				
				<td>' . $row['codigo'] . '</td>
				
				<td>' . $row['descripcion'] .'</td>
				
				<td>₡ ' . number_format($row['costo'], 2) . '</td>
			
				<td>' . $row['cantida'] . '</td>
				
				
				<td>
					<button onclick="DeleteUser(' . $row['codigo'] . ')" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
				</td>
    		</tr>';
		$number++;
	}
} else {
	// records now found 
	$data .= '<tr><td colspan="12" class="text-center">No hay registros!</td></tr>';
}

$data .= '</table> </div> </div>';

echo $data;
