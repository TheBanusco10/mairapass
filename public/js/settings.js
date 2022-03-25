$(function () {

    $('main').css('background-image', `linear-gradient(to bottom, rgba(0,0,0,.5), rgba(0,0,0,.2)), url("${getImage('backgroundImage') || '/imgs/fondo.jpg'}")`)

    accessibility();
    checkAlert();
    deleteAccount();
    
    // Fondo de la aplicación
    $('#cambiarFondo').on('click', function () {

       setImage('backgroundImage', $('#urlImagen').val());

    });

    $('#reiniciarFondo').on('click', function () {
        window.localStorage.removeItem('backgroundImage');
        $('main').css('background-image', `url("../imgs/fondo1.jpg")`);
    });

    $('#reiniciarAvatar').on('click', function () {
        window.localStorage.removeItem('avatarImage');
        window.location.reload();
    });

    let showingRecoveryCodes = false;
    $('[data-show_recovery_codes]').on('click', function() {
        
        const button = $(this);
        
        showingRecoveryCodes = !showingRecoveryCodes;

        const codesContainer = $('.recovery_codes');

        if (showingRecoveryCodes) {
            codesContainer.css('display', 'flex');
            button.html('Ocultar códigos');
        }else {
            codesContainer.css('display', 'none');
            button.html('Mostrar códigos');
        }

        
    });



});

/**
 * @description Atajos de teclado para una mejor accesibilidad
 */
function accessibility() {

    $(document).keypress(function (e) {
        let triggerEl = '';

        let code = e.keyCode || e.which;

        switch (code) {

            // Si pulsamos shift + 1
            case 33:
                triggerEl = $('#list-tab a[href="#contraseñas"]');
                $(triggerEl).tab('show');
                break;

            // Si pulsamos shift + 2
            case 34:
                triggerEl = $('#list-tab a[href="#tarjetas"]');
                $(triggerEl).tab('show');
                break;

            // Si pulsamos shift + 3
            case 183:
                triggerEl = $('#list-tab a[href="#pro"]');
                $(triggerEl).tab('show');
                break;

            // Si pulsamos shift + s
            case 83:
                if ($('#contraseñas').css('display') === 'none') triggerEl = $('#buscarTarjeta');
                else triggerEl = $('#buscarContraseña');
                $(triggerEl).focus();
                break;

            // Si pulsamos shift + a
            case 65:
                let elements = $('.añadir');
                console.log(elements);
                break;

        }


    });

}

/**
 * @description Guardamos la URL en LocalStorage
 * @param url
 */
function setImage(itemName, url) {
    window.localStorage.setItem(itemName, url);
    window.location.reload();
}

/**
 * @description Tomamos la URL y la añadimos al css de la etiqueta main
 */
function getImage(itemName) {

    return window.localStorage.getItem(itemName);

}

/**
 * @description Comprobamos si se ha mostrado la alerta y la ocultamos a los 3 segundos
 */
function checkAlert() {
    if ($('#alerta').css('display') != 'none') {
        setTimeout(() => {
            $('#alerta').removeClass('mostrarAlerta').addClass('quitarAlerta');
        }, 3000);
    }
}

function deleteAccount() {

    $('#eliminarCuentaBoton').attr('disabled', 'disabled');

    $('#eliminarCuentaInput').keyup(function () {

        $(this).val() === 'Eliminar cuenta' ? $('#eliminarCuentaBoton').removeAttr('disabled') : $('#eliminarCuentaBoton').attr('disabled', 'disabled');
    })
}

/**
 * @description Mostramos u ocultamos los códigos de recuperación 2FA
 */
 function changeRecoveryCodesVisibility(itemName, url) {
    window.localStorage.setItem(itemName, url);
    window.location.reload();
}
