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
                    <img class="" src="/uploads/{{ isset($friend['profile_picture']) ? $friend['profile_picture'] : 'default.jpg'}}" alt="Profile picture">
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
{{--  END OF FRIENDS LIST PART --}}