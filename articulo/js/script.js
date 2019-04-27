// Add Record
function addRecord() {
    // get values
    var codigoBarras = $("#codigoBarras").val();
    var descripcion = $("#descripcion").val();
    var utilidad = $("#utilidad").val();
    var impuesto = $("#impuesto").val();

    if (!codigoBarras || codigoBarras == "") {

        var dialog = new Messi(
            'Debe ingresar codigo de barras.',
            {
                title: 'Mensaje',
                titleClass: 'anim error',
                buttons: [{ id: 0, label: 'Cerrar', val: 'X' }]
            }
        );

        return;
    } else if (!descripcion || descripcion == "") {
        var dialog = new Messi(
            'Debe ingresar descripcion.',
            {
                title: 'Mensaje',
                titleClass: 'anim error',
                buttons: [{ id: 0, label: 'Cerrar', val: 'X' }]
            }
        );

        return;
    } else if (!utilidad || utilidad == "") {
        var dialog = new Messi(
            'Debe ingresar la utilidad.',
            {
                title: 'Mensaje',
                titleClass: 'anim error',
                buttons: [{ id: 0, label: 'Cerrar', val: 'X' }]
            }
        );

        return;
    } else if (!impuesto || impuesto == "") {
        var dialog = new Messi(
            'Debe ingresar impuesto.',
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


        var dialog = new Messi(
            'Producto ingresado.',
            {
                title: 'Mensaje',
                titleClass: 'anim success',
                buttons: [{ id: 0, label: 'Cerrar', val: 'X' }]
            }
        );


    });
}

// READ records
function readRecords() {
    $.get("ajax/readRecord.php", {}, function (data, status) {
        $("#records_content").html(data);
    });
}


function DeleteUser(id) {
    var dialog = new Messi(
        'Esta seguro de eliminar el articulo?',
        {
            title: 'Confirmación',
            buttons: [
                { id: 0, label: 'Yes', val: 'Y' },
                { id: 1, label: 'No', val: 'N' }
            ],
            callback: function (val) {
                if (val == 'Y') {
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
        }
    );

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
    var dialog = new Messi(
        'Articulo actualizado.',
        {
            title: 'Actualizando',
            titleClass: 'anim info',
            buttons: [{ id: 0, label: 'Close', val: 'X' }]
        }
    );
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



function cerrar(id) {
    var dialog = new Messi(
        'Esta seguro que desea cerrar sesion?',
        {
            title: 'Confirmación',
            buttons: [
                { id: 0, label: 'Yes', val: 'Y' },
                { id: 1, label: 'No', val: 'N' }
            ],
            callback: function (val) {
                if (val == 'Y') {
                    $.post("../cerrarCrud.php", {
                
                    },
                        function (data, status) {
                          
                        }
                    );
                }
            }
        }
    );
  
}