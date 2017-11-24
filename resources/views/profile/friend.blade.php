{{--  FRIENDS LIST PART --}}
<div class="wishy-profile wishy-friends-list col-12 mr-auto bg-light wishy-shadow-box-blue wishy-rounded mt-4 sticky-top">
    <div class="wishy-profile-friends pt-2">
        <h4 class="wishy-bold text-uppercase text-center">{{ isset($friendships) ? '' : 'my' }} friends</h4>
    </div>
    <div class="col-12 wishy-friends-search">
        <form action="" method="get">
            {{ csrf_field() }}
            <div class="form-group">
                <i class="fa fa-search" aria-hidden="true"></i>
                <input id="search" type="text" class="form-control" name="search" placeholder="SEARCH...">
            </div>
        </form>
    </div>
    <div class="list" data-id={{$user->id}}>
        @if (isset($friendships) && array_search($user->id, $friendships) === false)
            <div class="row mb-2">
                <p>Add {{ $user->name }} to view friends.</p>
            </div>
        @else 
            @foreach ($friends as $friend)
            <div class="row mb-2">
                <div class="col-4 d-flex justify-content-around">
                    <img class="" src="/uploads/{{ isset($friend['profile_picture']) ? $friend['profile_picture'] : 'default.jpg'}}" alt="Random profile picture">
                </div>
                <div class="col-8">
                    <a href="/profile/{{$friend['id']}}"><p class="wishy-bold"><i class="fa fa-circle online" aria-hidden="true"></i> {{$friend['user_name']}} {{$friend['surname']}}</p></a>
                </div>
            </div>
            <hr>
            @endforeach
        @endif
    </div>
    <div class="list2">

    </div>
</div>

<script>
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
                console.log(data);
                $('.list2').empty();

                for(var i = 0; i < data.length; i++) {
                    $('.list2').append(
                        '<div class="row mb-2">\n' +
                        '                <div class="col-4 d-flex justify-content-around">\n' +
                        '                    <img class="" src="/uploads/' + data[i].profile_picture + '" alt="Random profile picture">\n' +
                        '                </div>\n' +
                        '                <div class="col-8">\n' +
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



    })
</script>
{{--  END OF FRIENDS LIST PART --}}