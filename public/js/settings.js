$(function () {

    getImage();

   $('#cambiarFondo').click(function () {

       setImage($('#urlImagen').val());


   });


});

function setImage(url) {
    window.localStorage.setItem('image', url);
    window.location.reload();
}

function getImage() {
    let image = window.localStorage.image || '../imgs/passwordBackground2.jpg'
    $('main').addClass('bg');
    $('main').css('background-image', `url("${image}")`);
}
