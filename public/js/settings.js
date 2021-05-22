$(function () {

    getImage();
    accessibility();
    checkAlert();


    $('#cambiarFondo').click(function () {

       setImage($('#urlImagen').val());

   });

   $('#reiniciarFondo').click(function () {
       window.localStorage.removeItem('backgroundImage');
       getImage();
   });


});

/**
 * @description Atajos de teclado para una mejor accesibilidad
 */
function accessibility() {

    $(document).keypress(function (e) {
        let triggerEl = '';

        let code = e.keyCode || e.which;

        console.log(code);

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
function setImage(url) {
    window.localStorage.setItem('backgroundImage', url);
    window.location.reload();
}

/**
 * @description Tomamos la URL y la añadimos al css de la etiqueta main
 */
function getImage() {

    let image = window.localStorage.backgroundImage;
    image ? $('main').css('background-image', `url("${image}")`) : $('main').css('background-image', `url("../imgs/fondo1.jpg")`);

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
