   {{--  PROFILE PART --}}

    <div class="wishy-profile col-12 mr-auto bg-light wishy-shadow-box-blue wishy-rounded">
        <div class="wishy-profile-photo">
            <img class="w-100 image-fluid wishy-rounded-top" src="/uploads/{{ $userDetail != null ? $userDetail->profile_picture : 'dummy.png' }}" alt="Profile picture">
        </div>
        <div class="wishy-profile-info text-center my-4">
            <a href="#" class="btn wishy-btn edit" data-toggle="modal" data-target="#addProfileInfoModal"><i class="fa fa-{{ isset($friend) ? 'user-plus' : 'pencil' }}" aria-hidden="true"></i></a>
            <h3 class="wishy-bold"><strong>{{ $user->name }} {{ $user->surname }}</strong></h3>
            <small><p class="text-secondary">{{ $userDetail != null ? $userDetail->quote : 'User\'s quote' }}</p></small>
            <h5><i class="fa fa-birthday-cake" aria-hidden="true"></i> {{ $userDetail != null ? date('d.m.', strtotime($userDetail->birthday)) : ' Fill your birthday' }}</h5>
        </div>
        <div class="wishy-counter wishy-profile-bt">
            <div class="row">
                <div class="col-4 text-center pr-0 wishy-line-heigth">
                    <h2 class="wishy-bold">53</h2>
                    <p class="wishy-bold text-uppercase text-secondary">friends</p>
                </div>
                <div class="col-4 text-center wishy-profile-bx wishy-line-heigth">
                    <h2 class="wishy-bold">{{count($wishes)}}</h2>
                    <p class="wishy-bold text-uppercase text-secondary">wishes</p>
                </div>
                <div class="col-4 text-center pl-0 wishy-line-heigth">
                    <h2 class="wishy-bold">{{count($goals)}}</h2>
                    <p class="wishy-bold text-uppercase text-secondary">goals</p>
                </div>
            </div>
        </div>
    </div>

    {{--  END OF PROFILE PART --}}
