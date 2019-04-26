$(function () {

//Click Ingresar Usuario
    $("#btnIngresar").click(function () {
        _form = $("#frmIngresarUsuario");

        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'procesadatos.php',
            data: _form.serialize(),
            success: function (_data) {
                if (_data.valido) {
                    var dialog = new Messi(
                            'Usuario ingresado correctamente.',
                            {
                                title: 'Mensaje',
                                titleClass: 'anim success',
                                buttons: [{id: 0, label: 'Cerrar', val: 'X'}]
                            }
                    );
                } else {
                    var dialog = new Messi(
                            'Problemas al ingresar el usuario.',
                            {
                                title: 'Mensaje',
                                titleClass: 'anim error',
                                buttons: [{id: 0, label: 'Cerrar', val: 'X'}]
                            }
                    );
                }
            }
        });
    });

//Click Eliminar Usuario
    $("#btnEliminar").click(function () {
        _form = $("#frmEliminarUsuario");

        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'procesadatos.php',
            data: _form.serialize(),
            success: function (_data) {
                if (_data.valido) {
                    var dialog = new Messi(
                            'Usuario eliminado correctamente.',
                            {
                                title: 'Mensaje',
                                titleClass: 'anim success',
                                buttons: [{id: 0, label: 'Cerrar', val: 'X'}]
                            }
                    );
                } else {
                    var dialog = new Messi(
                            'Problemas al eliminar el usuario.',
                            {
                                title: 'Mensaje',
                                titleClass: 'anim error',
                                buttons: [{id: 0, label: 'Cerrar', val: 'X'}]
                            }
                    );
                }
            }
        });
    });
//Click Buscar Usuario
    $("#btnBuscar").click(function () {
        $(".contenedor").empty();
        _form = $("#frmBusqueda");

        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'procesadatos.php',
            data: _form.serialize(),
            success: function (_data) {
                if (_data.valido) {
                    $(".contenedor").append(_data.usuario);
                } else {
                    var dialog = new Messi(
                            'Problemas al ingresar el usuario.',
                            {
                                title: 'Mensaje',
                                titleClass: 'anim error',
                                buttons: [{id: 0, label: 'Cerrar', val: 'X'}]
                            }
                    );
                }
            }
        });
    });

//Click Actualizar Usuario
    $(document).on("click", "#btnActualizar", function () {
        _form = $("#frmActualizarUsuario");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'procesadatos.php',
            data: _form.serialize(),
            success: function (_data) {
                if (_data.valido) {
                    var dialog = new Messi(
                            'Usuario actualizado correctamente.',
                            {
                                title: 'Mensaje',
                                titleClass: 'anim success',
                                buttons: [{id: 0, label: 'Cerrar', val: 'X'}]
                            }
                    );
                } else {
                    var dialog = new Messi(
                            'Problemas al actualizar el usuario.',
                            {
                                title: 'Mensaje',
                                titleClass: 'anim error',
                                buttons: [{id: 0, label: 'Cerrar', val: 'X'}]
                            }
                    );
                }
            }
        });
    });
});