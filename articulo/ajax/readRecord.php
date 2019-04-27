<?php
	// include Database connection file 
	include("db_connection.php");

	// Design initial table header 
	$data = '
<div class="container">   <div class="table-responsive">	
<table class="table table-sm table-bordered table-striped">
						<tr>
							<th>Codigo</th>
							<th>Codigo de Barras</th>
							<th style="width:20%">Descripción</th>
							<th>Precio Venta</th>
							<th>Costo</th>
							<th>Utilidad</th>
							<th>Impuesto</th>
							<th>Existencia</th>
							<th></th>
							<th></th>
						</tr>';

	$query = "SELECT * FROM articulo";

	if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data .= '<tr>
				
				<td>'.$row['codigo'].'</td>
				<td>'.$row['codigoBarras'].'</td>
				<td>'.$row['descripcion'].'</td>
				<td>₡ '.number_format($row['precioVenta'], 2).'</td>
				<td>₡ '.number_format($row['costo'], 2).'</td>
				<td>'.number_format($row['utilidad'], 2).' %</td>
				<td>'.number_format($row['impuesto'], 2).' %</td>
				<td>'.$row['existencia'].'</td>
				
				<td>
					<button onclick="GetUserDetails('.$row['codigo'].')" class="btn btn-info"><i class="fas fa-edit"></i></button>
				</td>
				<td>
					<button onclick="DeleteUser('.$row['codigo'].')" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
				</td>
    		</tr>';
    		$number++;
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="12" class="text-center">No hay registros!</td></tr>';
    }

	$data .= '</table> </div> </div>';

    echo $data;
?>