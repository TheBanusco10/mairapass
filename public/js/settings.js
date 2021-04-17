$(function () {

    getImage();

   $('#cambiarFondo').click(function () {

       setImage($('#urlImagen').val());


   });

   $('#reiniciarFondo').click(function () {
       window.localStorage.removeItem('backgroundImage');
       getImage();
   });


});

function setImage(url) {
    window.localStorage.setItem('backgroundImage', url);
    window.location.reload();
}

function getImage() {
    let image = window.localStorage.backgroundImage || '../imgs/passwordBackground2.jpg'
    $('main').addClass('bg');
    $('main').css('background-image', `url("${image}")`);
}
