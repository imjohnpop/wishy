$( function() {

    // toggling between icons on commenting
    $('.comment').mouseover(function() {
        $(this).find('i').removeClass('fa-commenting-o').addClass('fa-commenting');
    });
    $('.comment').mouseout(function() {
        $(this).find('i').removeClass('fa-commenting').addClass('fa-commenting-o');
    });

    // toggling between wish and goal list in profile page
    $('.show-wishes-btn').click( function() {
        if( $('#wishes').hasClass('d-none') ) {
            $('#wishes').removeClass('d-none');
            $('#goals').addClass('d-none');
        }
    });
    $('.show-goals-btn').click( function() {
        if( $('#goals').hasClass('d-none') ) {
            $('#goals').removeClass('d-none');
            $('#wishes').addClass('d-none');
        }
    });
});