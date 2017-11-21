$( function() {
    $('.encourage').click(function(e) {
        var self = this;
        e.preventDefault();
        var id = $(this).data('id');
        var category = $(this).data('category');
        var url = "http://www.wishy.test:8080/encourage/"+category+"/"+id;
        var text = $(this).find('.encourage_text');
        if(text.text()==='Encourage') {
            var encouragement = true;
            text.text('Encouraged');
        } else {
            var encouragement = false;
            text.text('Encourage');
        }
        $.ajax({
            method: "post",
            url: url,
            data: {
                'id': id,
                'encouragement': encouragement
            }
        }).done(function(data) {
            $(self).find('.encourage_number').text('('+data+')');
        });
    });
});