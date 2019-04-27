// Add Record
function addRecord() {
    // get values
    var codigoBarras = $("#codigoBarras").val();
    var descripcion = $("#descripcion").val();
    var utilidad = $("#utilidad").val();
    var impuesto = $("#impuesto").val();

    // Add record
    $.post("ajax/addRecord.php", {
        codigoBarras: codigoBarras,
        descripcion: descripcion,
        utilidad: utilidad,
		impuesto: impuesto
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#codigoBarras").val("");
        $("#descripcion").val("");
        $("#utilidad").val("");
        $("#impuesto").val("");
    });
}

// READ records
function readRecords() {
    $.get("ajax/readRecord.php", {}, function (data, status) {
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
    // get values
    var codigoBarras = $("#update_codigoBarras").val();
    var descripcion = $("#update_descripcion").val();
    var utilidad = $("#update_utilidad").val();
    var impuesto = $("#update_impuesto").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/updateDetails.php", {
            id: id,
            codigoBarras: codigoBarras,
            descripcion: descripcion,
            utilidad: utilidad,
            impuesto: impuesto
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});