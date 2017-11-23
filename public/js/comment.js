$('div#comment-section').hide();
$('button.comment_update').parent().hide();

$('a[title="Comment"]').click(function(e){
    e.preventDefault();
    var comments = $(this).parent().parent().find('#comment-section');
    
    if(comments.css('display')=='none')
    {
        comments.show();
    } else {
        comments.hide();        
    }
})

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

$('a.comment_delete').click(function(e){
    e.preventDefault();

    $.ajax({
        url: $(this).attr('href'),
        method: 'DELETE'
    }).fail(function(){
        location.reload();
    });
});

$('a.comment_edit').click(function(e){
    e.preventDefault();
    var parent = $(this).parent().parent();
    parent.find('form').show();
    parent.find('p').hide();    
});

$('button.comment_update').click(function(e){
    e.preventDefault();

    var form = $(this).parent();
    var text = form.find('input').val();
        
    $.ajax({
        url: form.attr('action'),
        method: 'PUT',
        data : {
            'text' : text
        }
    }).fail(function(){
        location.reload();
    });
});