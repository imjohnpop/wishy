$( function() {
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

    $('.comment').mouseover(function() {
        $(this).find('i').removeClass('fa-commenting-o').addClass('fa-commenting');
    });
    $('.comment').mouseout(function() {
        $(this).find('i').removeClass('fa-commenting').addClass('fa-commenting-o');
    });


    function setMaxDate() {
        let dtToday = new Date();

        let month = dtToday.getMonth() + 1;
        let day = dtToday.getDate();
        let year = dtToday.getFullYear();

        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();

        let maxDate = year + '-' + month + '-' + day;
        $('#birthday').attr('max', maxDate);
    }
    setMaxDate();

    let $dateinput = $('[type="date"]') ;
    if ( $dateinput.prop('type') !== 'date' ) {
        $dateinput.datepicker();
    }
});