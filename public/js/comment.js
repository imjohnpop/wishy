$('div#comment-section').hide();
$('button.comment_update').parent().hide();
$('.wishy-post-nav').find('form').hide();
$('a[title="Close"]').hide();

$('a[title="Comment"]').click(function(e){
    e.preventDefault();
    
    var parent = $(this).parent();
    parent.find('form').show();
    parent.find('a').hide();
    parent.find('a[title="Close"]').show();

    $(this).parent().parent().find('#comment-section').show();
})

$('a[title="Close"]').click(function(e){
    e.preventDefault();
    
    var parent = $(this).parent();
    parent.find('form').hide();
    parent.find('a').show();
    parent.find('a[title="Close"]').hide();
    
    $(this).parent().parent().find('#comment-section').hide();
})

$('button.comment').click(function(e){
    e.preventDefault();

    var form = $(this).parent();
    var text = form.find('input').val();
    var category = form.find('button').attr('data-category');
        
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