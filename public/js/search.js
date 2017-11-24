$(function() {
    $("#friendsSearchBar").select2({
        ajax: {
            url: "/api/search/friends/",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data, params) {
                // parse the results into the format expected by Select2
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data, except to indicate that infinite
                // scrolling can be used
                params.page = params.page || 1;

                return {
                    results: data,
                };
            },
            cache: true
        },
        placeholder: 'Search for any user',
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo,
        templateSelection: formatRepoSelection,
    });


    function formatRepo (repo) {
        if (repo.loading) {
            return repo.text;
        }

        var markup =
                "<div class='select2-result-repository clearfix'>" +
                "<div class='row'>" +
                "<div class='col-4 select2-result-repository__avatar'><img class='w-100' src='/uploads/" + repo.profile_picture + "' /></div>" +
                "<div class='col-8'>" +
                "<div class='select2-result-repository__title text-center'><h3>" + repo.name + " " + repo.surname + "</h3></div>" +
                "<hr>" +
                "<div class='row'>" +
                "<div class='col-4 text-center pr-0 wishy-line-heigth'>" +
                "<h2 class='wishy-bold'>" + repo.friends + "</h2>" +
                "<p class='wishy-bold text-uppercase text-secondary'>friends</p>" +
                "</div>" +
                "<div class='col-4 text-center wishy-profile-bx wishy-line-heigth'>" +
                "<h2 class='wishy-bold'>" + repo.wishes + "</h2>" +
                "<p class='wishy-bold text-uppercase text-secondary'>wishes</p>" +
                "</div>" +
                "<div class='col-4 text-center pl-0 wishy-line-heigth'>" +
                "<h2 class='wishy-bold'>" + repo.goals + "</h2>" +
                "<p class='wishy-bold text-uppercase text-secondary'>goals</p>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>";
        return markup;
    }

    function formatRepoSelection (repo) {
        return repo.full_name || repo.text;
    }

    $("#birthday").birthdayPicker();

    $('#search').keyup(function() {
        var value = $('#search').val();

        var id = $('.list').data('id');

        if($(this).val() !== '') {
            $('.list').addClass('hidden');
            $.ajax({
                type: 'get',
                url: '/api/friends/' + id,
                data: {
                    term: value
                }
            }).done((data) => {
                $('.list2').empty();

                for(var i = 0; i < data.length; i++) {
                    $('.list2').append(
                        '<div class="row mb-2">\n' +
                        '                <div class="col-4 d-flex justify-content-around">\n' +
                        '                    <img class="" src="/uploads/' + data[i].profile_picture + '" alt="Random profile picture">\n' +
                        '                </div>\n' +
                        '                <div class="col-8 d-flex align-items-end">\n' +
                        '                    <a href="/profile/' + data[i].id + '"><p class="wishy-bold"><i class="fa fa-circle online" aria-hidden="true"></i>' + data[i].name + ' ' + data[i].surname + '</p></a>\n' +
                        '                </div>\n' +
                        '            </div>\n' +
                        '            <hr>')
                }
            });
        } else {
            $('.list').removeClass('hidden');
            $('.list2').empty();
        }
    });
});