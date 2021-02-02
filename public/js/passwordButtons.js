$(function () {

    // Copiar contraseña
    $('.copyPassword').each(function () {
        $(this).click(function () {

            let id = $(this).data('id');

            $(`input[name='${id}']`).prop('type', 'text');
            $(`input[name='${id}']`).select();
            document.execCommand("copy");
            $(`input[name='${id}']`).prop('type', 'password');
        });
    });

    // Mostras contraseña
    let mostrado = false;

    $('.showPassword').each(function () {
       $(this).click(function () {

           let id = $(this).data('id');

           if (!mostrado) {
               $(`input[name='${id}']`).prop('type', 'text');
               mostrado = true;
           }
           else {
               $(`input[name='${id}']`).prop('type', 'password');
               mostrado = false;
           }
       });
    });

});

function confirmarEliminarPassword(password) {

    $('#modalEliminarPassword').modal('show');
    $('#modalBody').text(`¿Está seguro de que desea eliminar la contraseña asociada a ${password.web}?`);

    $('#eliminarPasswordBoton').click(function () {

        $('#formEliminarPassword').prop('action', `/home/delete/${password.id}`);
        $('#formEliminarPassword').submit();

    });

}
