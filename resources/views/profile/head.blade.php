{{--  PROFILE PART --}}
<div class="wishy-profile col-12 mr-auto bg-light wishy-shadow-box-blue wishy-rounded">
    <div class="wishy-profile-photo">
        <img class="w-100 image-fluid wishy-rounded-top" src="/uploads/{{ $userDetail != null ? $userDetail->profile_picture : 'profilePictures/default.jpg' }}" alt="Profile picture">
    </div>
    <div class="wishy-profile-info text-center my-4">
        <?php if(isset($friendships) && array_search($user->id, $friendships) === false) {$icon = 'fa fa-user-plus';} else {$icon = 'fa fa-minus';}?>
        @if(isset($friendships))
            <a id="add_friend" href="{{ action('FriendController@friend', ['friend_id' => $user->id])}}" class="btn wishy-btn edit"><i class="{{$icon}}" aria-hidden="true"></i></a>
        @else
            <a href="" class="btn wishy-btn edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil" aria-hidden="true"></i></a>
        @endif
        <h3 class="wishy-bold"><strong>{{ $user->name }} {{ $user->surname }}</strong></h3>
        <small><p class="text-secondary">{{ $userDetail != null ? $userDetail->quote : 'User has no quote yet' }}</p></small>
        @if(isset($friendships) && array_search($user->id, $friendships) !== false)
            <h5><i class="fa fa-birthday-cake" aria-hidden="true"></i> {{ $userDetail != null ? date('d.m.', strtotime($userDetail->birthday)) : ' Fill your birthday' }}</h5>
            <small><p class="text-secondary">{{ $userDetail != null ? $userDetail->country : 'User has\'t specified his country' }}</p></small>
        @elseif(Illuminate\Support\Facades\Auth::check())
                <h5><i class="fa fa-birthday-cake" aria-hidden="true"></i> {{ $userDetail != null ? date('d.m.', strtotime($userDetail->birthday)) : ' Fill your birthday' }}</h5>
                <small><p class="text-secondary">{{ $userDetail != null ? $userDetail->country : 'User has\'t specified his country' }}</p></small>
        @endif
    </div>
    <div class="wishy-counter wishy-profile-bt">
        <div class="row">
            <div class="col-4 text-center pr-0 wishy-line-heigth">
                <h2 class="wishy-bold">{{$nr_friends}}</h2>
                <p class="wishy-bold text-uppercase text-secondary">friends</p>
            </div>
            <div class="col-4 text-center wishy-profile-bx wishy-line-heigth">
                <h2 class="wishy-bold">{{$wishes}}</h2>
                <p class="wishy-bold text-uppercase text-secondary">wishes</p>
            </div>
            <div class="col-4 text-center pl-0 wishy-line-heigth">
                <h2 class="wishy-bold">{{$goals}}</h2>
                <p class="wishy-bold text-uppercase text-secondary">goals</p>
            </div>
        </div>
    </div>
</div>

{{--  END OF PROFILE PART --}}
