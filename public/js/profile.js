$( function() {

    // Friend and Unfriend function
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
        }).fail(function(){
            location.reload();
        });
    });

});