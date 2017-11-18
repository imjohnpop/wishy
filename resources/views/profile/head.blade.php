
<section class="wishy-profile col-3">

    {{--  PROFILE PART --}}

    <div class="wishy-profile col-12 mr-auto bg-light wishy-shadow-box-blue wishy-rounded">
        <div class="wishy-profile-photo">
            <img class="w-100 image-fluid wishy-rounded-top" src="/uploads/{{ $userDetail != null ? $userDetail->profile_picture : 'dummy.png' }}" alt="Profile picture">
        </div>
        <div class="wishy-profile-info text-center my-4">
            <a href="#" class="btn wishy-btn edit" data-toggle="modal" data-target="#addProfileInfoModal"><i class="fa fa-pencil" aria-hidden="true"></i></a>
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

    {{--  FRIENDS LIST PART --}}

    <div class="wishy-profile wishy-friends-list col-12 mr-auto bg-light wishy-shadow-box-blue wishy-rounded mt-4">
        <div class="wishy-profile-friends pt-2">
            <h4 class="wishy-bold text-uppercase text-center">my friends</h4>
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
        <div class="list">
            <div class="row mb-2">
                <div class="col-4 d-flex justify-content-around">
                    <img class="" src="/img/ludo.jpg" alt="Random profile picture">
                </div>
                <div class="col-8">
                    <p class="wishy-bold"><i class="fa fa-circle online" aria-hidden="true"></i> Ludo Holbik</p>
                </div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-4 d-flex justify-content-around">
                    <img class="" src="/img/jan.jpg" alt="Random profile picture">
                </div>
                <div class="col-8">
                    <p class="wishy-bold"><i class="fa fa-circle online" aria-hidden="true"></i> Jan Poprocsi</p>
                </div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-4 d-flex justify-content-around">
                    <img class="" src="/img/elena.jpg" alt="Random profile picture">
                </div>
                <div class="col-8">
                    <p class="wishy-bold"><i class="fa fa-circle offline" aria-hidden="true"></i> Elena Porras</p>
                </div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-4 d-flex justify-content-around">
                    <img class="" src="/img/ludo.jpg" alt="Random profile picture">
                </div>
                <div class="col-8">
                    <p class="wishy-bold"><i class="fa fa-circle online" aria-hidden="true"></i> Ludo Holbik</p>
                </div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-4 d-flex justify-content-around">
                    <img class="" src="/img/jan.jpg" alt="Random profile picture">
                </div>
                <div class="col-8">
                    <p class="wishy-bold"><i class="fa fa-circle online" aria-hidden="true"></i> Jan Poprocsi</p>
                </div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-4 d-flex justify-content-around">
                    <img class="" src="/img/elena.jpg" alt="Random profile picture">
                </div>
                <div class="col-8">
                    <p class="wishy-bold"><i class="fa fa-circle offline" aria-hidden="true"></i> Elena Porras</p>
                </div>
            </div>
            <hr>
        </div>

    </div>

    {{--  END OF FRIENDS LIST PART --}}

</section>

