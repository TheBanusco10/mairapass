// Utilizamos la librería zxcvbn para comprobar la seguridad de la contraseña
requirejs(['zxcvbn'], function (zxcvbn) {
    $(function () {

        $('#generatePassword').click(function () {

            let length = parseInt($('#inputRange').val());
    
            $('#password').val(rand(length));
            comprobarPassword($('#password').val());
    
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
        
        function comprobarPassword(password) {
        
            $('#textoInformacionPassword').show();

            let {score, feedback} = zxcvbn(password);
            let resultado = zxcvbn(password);

            let color;

            if (score === 0 || score === 1) color = 'danger';
            if (score === 2 || score === 3) color = 'warning';
            if (score === 4) color = 'success';


            $('#progresoPassword').removeClass();

            $('#progresoPassword').addClass(['progress-bar', `bg-${color}`]);

            feedback.warning !== '' ?  $('#textoInformacionPassword').html(feedback.warning) : $('#textoInformacionPassword').hide();

            $('#progresoPassword').css('width', `${score * 25}%`);
        
        }
    
    })
});

function rand(length) {

    let string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz-./~$#+';

    let password = '';

    for (let i = 0; i < length; i++) {

        password += string.charAt(Math.random() * string.length);
    }

    return password;

}
