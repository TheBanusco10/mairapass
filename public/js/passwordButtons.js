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

function confirmarEliminar(elemento, tipo) {

    $('#modalEliminar').modal('show');
    $('#modalBody').text(`¿Está seguro de que desea eliminar este elemento?`);

    $('#eliminarBotonModal').click(function () {

        // Comprobamos el tipo del elemento para eliminar el correcto
        $('#formEliminarPassword').prop('action', tipo === 'contraseña' ? `/home/delete/${elemento.id}` : `/home/delete-card/${elemento.id}`);
        $('#formEliminarPassword').submit();

    });

}
