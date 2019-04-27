// Add Record
function addRecord() {
    // get values
    var numeroFactura = $("#numeroFactura").val();


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
        $("#Codigo").val("");
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
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});