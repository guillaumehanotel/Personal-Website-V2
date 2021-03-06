
function redimensionnement($image){

    //var $image = $('img.bg-img-ynov');
    var image_width = $image.width();
    var image_height = $image.height();

    var over = image_width / image_height;
    var under = image_height / image_width;

    var body_width = $(window).width();
    var body_height = $(window).height();

    if (body_width / body_height >= over) {
        $image.css({
            'width': body_width + 'px',
            'height': Math.ceil(under * body_width) + 'px',
            'left': '0px',
            'top': Math.abs((under * body_width) - body_height) / -2 + 'px'
        });
    }

    else {
        $image.css({
            'width': Math.ceil(over * body_height) + 'px',
            'height': body_height + 'px',
            'top': '0px',
            'left': Math.abs((over * body_height) - body_width) / -2 + 'px'
        });
    }
}



$(document).ready(function(){

    var $background_cv = $('img.bg-img-ynov');
    var $background_blog = $('img.bg-img-texture');

    // Au chargement initial
    redimensionnement($background_blog);
    redimensionnement($background_cv);

    // En cas de redimensionnement de la fenêtre
    $(window).resize(function(){
        redimensionnement($background_blog);
        redimensionnement($background_cv);
    });


    $(".realisation-content").mouseenter(function(){
        $(this).find("div").stop().fadeIn();
    });

    $(".realisation-content").mouseleave(function(){
        $(this).find("div").stop().fadeOut();
    });


    $(".admin-access").mouseenter(function () {
        $(".admin-access a").show();
    })

    $(".admin-access").mouseleave(function () {
        $(".admin-access a").hide();
    })



});