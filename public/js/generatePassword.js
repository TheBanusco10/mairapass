$(function () {

    $('#generatePassword').click(function () {

        let length = parseInt($('#inputRange').val());

        $('#password').val(rand(length));

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


});

function rand(length) {

    let string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz-./~$#+';

    let password = '';

    for (let i = 0; i < length; i++) {

        password += string.charAt(Math.random() * string.length);
    }

    return password;

}
