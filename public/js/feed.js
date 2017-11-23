$('button.comment').click(function(e){
    e.preventDefault();

    var form = $(this).parent();
    var text = form.find('input').val();
    var category = form.find('button').attr('id');
    
    $.ajax({
        url: form.attr('action'),
        method: 'post',
        data : {
            'text' : text,
            'category' : category
        }
    }).done(function(){
        location.reload();
    });
});