$(function () {

    let backgroundImage = getImage('backgroundImage');
    backgroundImage ? $('main').css('background-image', `url("${backgroundImage}")`) : $('main').css('background-image', `url("../imgs/fondo1.jpg")`);

    let avatarImage = getImage('avatarImage');
    if (avatarImage) {
        $('.userAvatar').attr('src', avatarImage);
        $('#imagenAvatarMuestra > img').attr('src', avatarImage);
    }else {
        $('.userAvatar').attr('src', '../imgs/avatar.png');
        $('#imagenAvatarMuestra > img').attr('src', '../imgs/avatar.png');
    }

    accessibility();
    checkAlert();
    deleteAccount();

    // Fondo de la aplicación
    $('#cambiarFondo').click(function () {

       setImage('backgroundImage', $('#urlImagen').val());

    });

    $('#reiniciarFondo').click(function () {
        window.localStorage.removeItem('backgroundImage');
        $('main').css('background-image', `url("../imgs/fondo1.jpg")`);
    });

    // Imagen de avatar
    $('#cambiarAvatar').click(function () {

        setImage('avatarImage', $('#urlImagenAvatar').val());

    });

    $('#reiniciarAvatar').click(function () {
        window.localStorage.removeItem('avatarImage');
        window.location.reload();
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
