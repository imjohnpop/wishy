<section id="wishes">

    @if(isset($wishes))
        @foreach($wishes as $wish)
            <div class="wish col-12 wishy-rounded wishy-shadow-box-blue bg-light">
                @if(isset($wish->wish_picture))
                    <div class="wish-image">
                        <img class="wishy-rounded-top" src="/uploads/{{$wish->wish_picture}}" alt="wish image">
                    </div>
                @endif
                <div class="wishy-wish-info">
                    <div class="wishy-user-info">
                        <div class="profile-wish-thumbnail">
                            <img class="profile-thumbnail img-fluid" src="/uploads/{{ $userDetail != null ? $userDetail->profile_picture : 'dummy.png' }}" alt="Profile Name">
                        </div>
                        <div class="wishy-user-text">
                            <h5>{{ $user->name }} {{ $user->surname }}</h5>
                            <p>Added at: <span>{{ $wish->created_at->format('d.m.Y') }}</span></p>
                        </div>
                        <div class="wish-category">
                            @if (!isset($friend))
                            <button class="btn wishy-btn menu"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                            @endif
                            <p>Category: <span>wish</span></p>
                        </div>
                    </div>
                    <div class="wishy-wish-text">
                        <h4>{{ $wish->name }}</h4>
                        <p>{{ $wish->description }}</p>
                    </div>
                </div>
                <div class="wishy-wish-nav wish wishy-rounded-bottom">
                    <a href="#" class="encourage" title="Encourage"><i class="fa fa-hand-peace-o mr-1" aria-hidden="true"></i>Encourage <span>({{ $wish->nr_encouragements }})</span></a>
                    <a href="#" title="Status" class="comment ml-3"><i class="fa fa-certificate mr-1" aria-hidden="true"></i>Status</a>
                </div>
            </div>
        @endforeach
    @else
        <div class="wish col-12 wishy-rounded wishy-shadow-box-blue bg-light py-3">
            <h3 class="text-center">You don't have any wishes yet!</h3>
        </div>
    @endif

</section>