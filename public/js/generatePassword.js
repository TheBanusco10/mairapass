$(function () {

    $('#generatePassword').click(function () {

        /* 
        * Comprobamos qué opciones ha marcado el usuario para generar la contraseña
        * Solo mayúsculas, minúsculas, combinaciones, símbolos...
        */
        let passwordOptions = checkOptions({
            uppers: $('#mayusculas').prop('checked'),
            lowers: $('#minusculas').prop('checked'),
            digits: $('#digitos').prop('checked'),
            symbols: $('#simbolos').prop('checked'),
        });

        /**
         * Generamos la contraseña con una longitud y las opciones
         */
        let password = generatePassword.randomPassword({
            length: parseInt($('#inputRange').val()),
            characters: passwordOptions
        });

        // Mostramos el resultado de la contraseña en el input
        $('#password').val(password);

        // Comprobamos la seguridad de la contraseña
        comprobarPassword(password);
    });

    // Mostras contraseña
    let mostrado = false;

    $('.showPassword').click(function () {

        if (!mostrado) {
            $('#password').prop('type', 'text');
            mostrado = true;
        }
        else {
            $('#password').prop('type', 'password');
            mostrado = false;
        }
    });

    $('#password').keyup(function () {

        comprobarPassword($(this).val());

    });


});

function comprobarPassword(password) {

    $('#textoInformacionPassword').show();

    let {score, feedback} = zxcvbn(password);

    let color;

    if (score === 0 || score === 1) color = 'danger';
    if (score === 2 || score === 3) color = 'warning';
    if (score === 4) color = 'success';


    $('#progresoPassword').removeClass();

    $('#progresoPassword').addClass(['progress-bar', `bg-${color}`]);

    feedback.warning !== '' ?  $('#textoInformacionPassword').html(feedback.warning) : $('#textoInformacionPassword').hide();

    $('#progresoPassword').css('width', `${score * 25}%`);

}

/**
 * @description Comprueba las opciones que ha elegido el usuario para la contraseña y devuelve las opciones finales
 * @param values Object
 * @returns Array
 */
function checkOptions(values) {

    let options = [];

    if (values.uppers) options.push(generatePassword.upper);
    if (values.lowers) options.push(generatePassword.lower);
    if (values.digits) options.push(generatePassword.digits);
    if (values.symbols) options.push(generatePassword.symbols);

    return options;

}

function rand(length) {

    let string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz-./~$#+';

    let password = '';

    for (let i = 0; i < length; i++) {

        password += string.charAt(Math.random() * string.length);
    }

    return password;

}
