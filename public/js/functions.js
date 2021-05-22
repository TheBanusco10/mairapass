let mostrado = false;

/**
 * @description Mostramos un input de tipo contraseña con la ID dada
 * @param id Es NECESARIO añadir # para la ID
 */
function mostrarCampo(id) {

    if (!mostrado) {
        $(`${id}`).prop('type', 'text');
        mostrado = true;
    }
    else {
        $(`${id}`).prop('type', 'password');
        mostrado = false;
    }
}

/**
 * @description Comprobamos si he ha pulsado el botón para mostrar la contraseña o Shift + m
 * @param id Es NECESARIO añadir # para la ID
 */
function comprobarMostrarCampo(id) {

    $(document).keypress(function (e) {
        let code = e.keyCode || e.which;

        switch (code) {

            // Si pulsamos shift + m
            case 77:
                $(id).click(function () {
                    mostrarCampo(id);
                });
                break;
        }

    });


    $('.showPassword').click(function () {
        mostrarCampo(id);
    });
}
