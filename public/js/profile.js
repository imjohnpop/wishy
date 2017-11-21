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

$('a#add_friend').click(function(e){
    e.preventDefault();
   
    var self = $(this);
    var icon = self.find('i');

    if(icon.hasClass('fa fa-minus'))
    {
        icon.attr('class', 'fa fa-user-plus');
    } else {
        icon.attr('class', 'fa fa-minus');        
    }
    
    $.ajax({
        url: self.attr('href'),
        method: 'post'
    });

});