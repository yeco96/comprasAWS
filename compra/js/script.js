// Add Record
function addRecord() {
    // get values
    var numeroFactura = $("#numeroFactura").val();

    if (!numeroFactura || numeroFactura == "") {

        var dialog = new Messi(
            'Debe ingresar un numero de factura.',
            {
                title: 'Mensaje',
                titleClass: 'anim error',
                buttons: [{ id: 0, label: 'Cerrar', val: 'X' }]
            }
        );

        return;
    }

    // Add record
    $.post("ajax/addRecord.php", {
        numeroFactura: numeroFactura
    }, function (data, status) {

        var user = JSON.parse(data);

        // close the popup
        $("#add_new_record_modal").modal("hide");
        // read records again
        readRecords(user.solicitud);
        // clear fields from the popup
        $("#numeroFactura").val("");

        $("#numCompra").val(user.solicitud);
        $("#numeroFacturaTemp").val(numeroFactura);

        $("#btndetalle").show();
        $("#numeroFacturaTemp").show();
        $("#btnfacturar").show();


        $("#btniniciar").hide();
        

        // GetUserDetails(user.solicitud);

    });
}


// Add Record
function addDetail() {
    // get values
    var codigo = $("#codigo").val();
    var costo = $("#costo").val();
    var cantidad = $("#cantidad").val();
    var numCompra = $("#numCompra").val();



    var articulo_descripcion = $("#articulo_descripcion").val();


    if (!articulo_descripcion || articulo_descripcion == "") {

        var dialog = new Messi(
            'Debe ingresar un articulo.',
            {
                title: 'Mensaje',
                titleClass: 'anim error',
                buttons: [{ id: 0, label: 'Cerrar', val: 'X' }]
            }
        );

        return;
    }

    // Add record
    $.post("ajax/addDetail.php", {
        Codigo: codigo,
        solicitud: numCompra,
        costo: costo,
        cantidad: cantidad
    }, function (data, status) {

        var user = JSON.parse(data);

        $("#add_new_detail_modal").modal("hide");
        readRecords(numCompra);

        $("#codigo").val("");
        $("#costo").val("");
        $("#cantidad").val("");
        $("#numCompra").val("");

    });
}

// READ records
function readRecords(id) {
    $.post("ajax/readRecord.php", { id: id }, function (data, status) {
        $("#records_content").html(data);
    });
}


function DeleteUser(id) {
    var conf = confirm("¿Está seguro, realmente desea eliminar el registro?");
    if (conf == true) {
        $.post("ajax/delete.php", {
            id: id
        },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("ajax/readDetails.php", {
        id: id
    },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_codigoBarras").val(user.codigoBarras);
            $("#update_descripcion").val(user.descripcion);
            $("#update_utilidad").val(user.utilidad);
            $("#update_impuesto").val(Number(user.impuesto).toFixed(0));
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    var id = $("#numCompra").val();
    // Update the details by requesting to the server using ajax
    $.post("ajax/updateDetails.php", {
        id: id
    },
        function (data, status) {
            readRecords();
            $("#btndetalle").hide();
            $("#numeroFacturaTemp").hide();
            $("#btnfacturar").hide();
            $("#btniniciar").show();
        }
    );
}

$(document).ready(function () {

    
    $("#btndetalle").hide();
    $("#numeroFacturaTemp").hide();
    $("#btnfacturar").hide();
    $("#btniniciar").show();
    // READ recods on page load
    readRecords(); // calling function
});


function getArticulo() {
    var codigo = $("#codigo").val();


    if (!codigo || codigo == "") {

        var dialog = new Messi(
            'Debe ingresar un codigo de articulo.',
            {
                title: 'Mensaje',
                titleClass: 'anim error',
                buttons: [{ id: 0, label: 'Cerrar', val: 'X' }]
            }
        );

        return;
    }

    $.post("../articulo/ajax/readDetails.php", {
        id: codigo
    },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            $("#articulo_descripcion").val(user.descripcion);


            if (!user.descripcion) {

                var dialog = new Messi(
                    'El codigo no existe.',
                    {
                        title: 'Mensaje',
                        titleClass: 'anim error',
                        buttons: [{ id: 0, label: 'Cerrar', val: 'X' }]
                    }
                );
        
                return;
            }


        }
    );
   
}