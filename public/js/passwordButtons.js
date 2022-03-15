$(function () {

    // Copiar contraseña
    $('.copyPassword').each(function () {
        $(this).click(function () {
            copiarContraseña($(this).data('id'));
        });
    });

    // Copiar contraseña al hacer click en el input
    $('input[type="password"]').click(function () {
        copiarContraseña($(this).data('id'));
    })

    // Mostrar contraseña
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

function copiarContraseña(id) {
    navigator.clipboard.writeText($(`input[name='${id}']`).val());
}

function confirmarEliminar(id, tipo) {

    $('#modalEliminar').modal('show');
    $('#modalBody').text(`¿Está seguro de que desea eliminar este elemento?`);

    $('#eliminarBotonModal').on('click', function () {

        // Comprobamos el tipo del elemento para eliminar el correcto
        $('#formEliminarPassword').prop('action', tipo === 'contraseña' ? `/home/delete/${id}` : `/home/delete-card/${id}`);
        $('#formEliminarPassword').trigger('submit');

    });

}
