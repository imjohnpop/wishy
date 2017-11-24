$(function() {
    $('.encourage').click(function(e) {

        e.preventDefault();

        let self = this;
        let id = $(this).data('id');
        let category = $(this).data('category');
        let url = "http://www.wishy.test:8080/encourage/"+id;
        let text = $(this).find('.encourage_text');

        if(text.text()==='Encourage ') {
            text.text('Encouraged ');
        } else {
            text.text('Encourage ');
        }

        $.ajax({
            method: "post",
            url: url,
            data: {
                'id': id,
                'category': category
            }
        }).done(function(data) {
            $(self).find('i');
            $(self).find('.encourage_number').text('('+data+')');
        });

    });
});