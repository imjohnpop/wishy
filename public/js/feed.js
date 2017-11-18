$( function() {
    $('.encourage-button').click( function(){
        $.ajax({
            "url" : "calcu.php",
            "type" : "post",
            "data" : {
                    "json":json,
                    "number1" : number1,
                    "number2" : number2,
                    "operand" : operand
                }
            })
            .done(function(data) {
                $('#result').val(data);
        });
    });
});



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
}