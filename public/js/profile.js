$( function() {
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