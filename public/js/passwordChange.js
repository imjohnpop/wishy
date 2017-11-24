$(function() {

    // checking if the input password is matching with the current password
    $('#currentPassword').keyup(function() {
        let value = $('#currentPassword').val();

        if($(this).val() !== '') {
            $.ajax({
                method: 'get',
                url: '/api/passwordCurrent',
                data: {
                    currentPassword: value
                }
            }).done((data) => {
                console.log(data);
            });
        }
    });
});