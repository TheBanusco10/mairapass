$(function () {

    $('#buscarImagen').keyup(function () {

        if ($('#buscarImagen').val() == '') $('#resultadosImagen').html('');
    });

    $('#imagenesForm').on('submit', function (e) {
        e.preventDefault();

        let imagenABuscar = $('#buscarImagen').val();

        if (imagenABuscar != '' && imagenABuscar.length >= 3) {
            $.get(`https://api.unsplash.com/search/photos?page=1&query=${imagenABuscar}&client_id=1GNzdWkEGLA7kITUfTGoi_GlUoUW7u8-bslQ-XzJhgw`, function(data) {
                let {results: images} = data;

                $('#resultadosImagen').html(
                    images.map(element => {
                        return `<div id="${element.id}" class="imagen" data-url="${element.urls.full}">
                                    <img src="${element.urls.thumb}" alt="fondo">
                                </div>`
                    })
                );

            });
        }

    });

    $('#resultadosImagen').on('click', '.imagen', function () {

        setImage($(this).data('url'));

    });


});
