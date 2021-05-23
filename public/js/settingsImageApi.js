$(function () {

    $('#buscarImagen').keyup(function () {

        if ($('#buscarImagen').val() == '') $('#resultadosImagen').html('');
    });

    $('#imagenesForm').on('submit', function (e) {
        console.log('Dentro');
        e.preventDefault();

        let imagenABuscar = $('#buscarImagen').val();

        if (imagenABuscar != '' && imagenABuscar.length >= 3) {
            $.get(`https://pixabay.com/api/?key=18966501-51e9929a6ba9713e742f5f513&q=${imagenABuscar}&safesearch=true`, function(data) {
                let {hits: images} = data;

                $('#resultadosImagen').html(
                    images.map(element => {
                        return `<div id="${element.id}" class="imagen" data-url="${element.largeImageURL}">
                                    <img src="${element.largeImageURL}" alt="fondo">
                                </div>`
                    })
                );

            });
        }

    });

    $('#resultadosImagen').on('click', '.imagen', function () {

        console.log($(this).attr('id'));
        setImage($(this).data('url'));

    });


});
