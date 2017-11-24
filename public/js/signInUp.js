$(function() {
    $('#signup').click(function () {

        $('#register').hide();
        $('#reset').hide();
        $('#finalreset').hide();
        $('#login').fadeIn('slow');


        $('.wishy-login').animate({
            left: '480px'
        }, 600, function () {
            $('.wishy-login').animate({
                left: '438px'
            }, 200)

        })
    });

    $('#signin').click(function () {

        $('#login').hide();
        $('#reset').hide();
        $('#finalreset').hide();
        $('#register').fadeIn('slow');


        $('.wishy-login').animate({
            left: '-10px'
        }, 600, function () {
            $('.wishy-login').animate({
                left: '25px'
            }, 200)

        })
    });

    $('#pw-reset').click(function (ev) {
        ev.preventDefault();
        $('#login').hide();
        $('#reset').fadeIn('slow');
    });
});