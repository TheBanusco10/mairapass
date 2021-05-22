$(function () {

    // Validar tarjeta de crédito
    $('#card_number').keyup(function() {

        if ($(this).val().length < 18) {

            // Añadimos un espacio cada 4 números
            if ($(this).val().length == 4 || $(this).val().length == 9 || $(this).val().length == 14) $(this).val($(this).val() + ' ');


        }else {
            $(this).val($(this).val().substring(0, 19));
        }

        comprobarTipoTarjetaCredito($(this));


    });

    $('#card_number').focusout(function () {

        let valor = this.value;
        let tarjetaCreditoRegex = new RegExp(/^[0-9]{4}\s[0-9]{4}\s[0-9]{4}\s[0-9]{4}$/);

        comprobarTipoTarjetaCredito($(this));

        if (!tarjetaCreditoRegex.test(valor)) {

            let nuevoValor = '';

            for (let index = 0; index < $(this).val().length; index++) {
                const element = $(this).val()[index];

                if (index == 3 || index == 7 || index == 11) nuevoValor += `${element} `;
                else nuevoValor += element;

            }

            $(this).val(nuevoValor);
        }



    });

    // Validamos la fecha de caducidad
    $('#expiration').focusout(function () {

        let valor = $(this).val();
        let expirationRegex = new RegExp(/^[0-9]{2}[/][0-9]{4}/);

        let anio = valor.substr(3, valor.length);
        let mes = valor.substr(0, 2);

        let fechaActual = new Date();
        let fechaTarjeta = new Date(`${anio}/${mes}}`);

        if (!expirationRegex.test(valor) || fechaTarjeta <= fechaActual)  $(this).val('');

    });

    // Validar CCV
    $('#ccv').keyup(function() {
        if (!$.isNumeric($(this).val()))
            $(this).val($(this).val().substring(0, $(this).val().length - 1));

        if ($(this).val().length > 4) $(this).val($(this).val().substring(0, 4));


    });

    comprobarMostrarCampo('#ccv');

});

function comprobarTipoTarjetaCredito(thisObj) {

    // Comprobamos el tipo de tarjeta
    if (thisObj.val().length >= 5) {

        switch(thisObj.val().charAt(5)) {

            case '3':
                tipoTarjetaCredito('amex');
                break;
            case '4':
                tipoTarjetaCredito('visa');
                break;
            case '5':
                tipoTarjetaCredito('mastercard');
                break;

            default:
                tipoTarjetaCredito('');
                break;

        }

    }

}

function tipoTarjetaCredito(clase) {

    $('#cardType').removeClass();
    $('#cardType').addClass(`fab fa-cc-${clase}`);
    $('#cardType').attr('title', clase).attr();
}
