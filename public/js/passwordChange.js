$(function() {

    $('#current').show();
    $('#newPass').hide();
    $('#message').hide();

    // checking if the input password is matching with the current password
    $('#currentPasswordSubmit').click(function(e) {
        e.preventDefault();
        let value = $('#currentPassword').val();
        let id = $('form#passwordChange').data('id');
        if(value !== '') {
            $.ajax({
                method: 'post',
                url: '/api/passwordCurrent/' + id,
                data: {
                    'currentPassword': value
                }
            }).done((data) => {
                if(data==='false') {
                    $('#message').show();
                    $('#message').html('<div id="error">' +
                        'Password is not matching with current password!' +
                        '</div>');
                } else if (data==='true') {
                    $('#message').hide();
                    $('#current').hide();
                    $('#newPass').show();
                }
            });
        }
    });

    $('#PasswordChangeSubmit').click(function(e) {
        e.preventDefault();
        let newPass = $('#new').val();
        let confirm = $('#confirm').val();
        let form = $('form#passwordChange');
        let id = form.data('id');
        if(newPass !== '' && newPass === confirm && newPass.length>=6) {
            $.ajax({
                method: 'post',
                url: '/api/passwordChange/new/'+id,
                data: {
                    'new': newPass
                }
            }).done((data) => {
                if(data==='true') {
                    form.before('<div id="success">' +
                        'Password is changed' +
                        '</div>');
                    form.detach();
                }
            });
        } else if (newPass !== confirm) {
            $('#message').html('<div id="error">' +
                'Passwords are not matching!' +
                '</div>');
        } else if (newPass === '') {
            $('#message').html('<div id="error">' +
                'You need to fill your new password!' +
                '</div>');
        } else if (newPass.length<6) {
            $('#message').html('<div id="error">' +
                'Password needs to be at least 6 characters long!' +
                '</div>');
        }
    });
});