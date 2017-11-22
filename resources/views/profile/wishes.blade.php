<section id="wishes">
    @if (isset($friendships) && array_search($user->id, $friendships) === false)
        <div class="wish col-12 wishy-rounded wishy-shadow-box-blue bg-light">
            <p>Add {{ $user->name }} to view {{ !isset($userDetail->gender) ? 'his/her' : ($userDetail->gender == 'female' ? 'her' : 'his') }} wishes.</p>
        </div>
    @else
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
                                @if (!isset($friendships))
                                    <div class="row">
                                        <button class="btn wishy-btn menu editBtn" data-id="{{ $wish->id }}"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                        <form action="{{ action('WishController@destroy', ['id'=> $wish->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn wishy-btn menu"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </div>
                                @endif
                                <p>Category: <span>{{ $wish->cathegory }}</span></p>
                            </div>
                        </div>
                        <div class="wishy-wish-text">
                            <form action="{{ action('WishController@update', ['id'=> $wish->id]) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <h4 class="infoToChange" data-id="{{ $wish->id }}">{{ $wish->name }}</h4>
                                <input class="infoToChange hidden form-control" data-id="{{ $wish->id }}" type="text" name="name" value="{{ $wish->name }}">
                                <p class="infoToChange" data-id="{{ $wish->id }}">{{ $wish->description }}</p>
                                <input class="infoToChange hidden form-control" data-id="{{ $wish->id }}" type="text" name="description" value="{{ $wish->description }}">
                                <div class="infoToChange hidden form-group" data-id="{{ $wish->id }}">
                                    <div class="row mt-1">
                                        <div class="col-4">
                                            <label for="is_public">Make it public? </label>
                                        </div>
                                        <div class="col-6 mt-1">
                                            <input name="is_public" type="checkbox" class="form-control" id="is_public" <?= ($wish->is_public == 1) ? 'checked' : '' ?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group infoToChange hidden" data-id="{{ $wish->id }}">
                                    <label for="wish_picture">Wish Picture</label>
                                    <div class="col">
                                        <input name="wish_picture" type="file" class="form-control" id="wish_picture" value="{{ $wish->wish_picture }}">
                                    </div>
                                </div>
                                <button type="submit" class="infoToChange hidden form-group btn wishy-btn" data-id="{{ $wish->id }}">Save Changes</button>
                            </form>
                        </div>
                    </div>
                    <div class="wishy-wish-nav wish wishy-rounded-bottom">
                        <a href="#" class="encourage" title="Encourage" data-id="{{ $wish->id }}" data-category="{{ $wish->cathegory }}"><i class="fa fa-hand-peace-o mr-1" aria-hidden="true"></i><span class="encourage_text">Encourage</span> <span class="encourage_number">({{ $wish->nr_encouragements }})</span></a>
                        <a href="#" title="Status" class="comment ml-3"><i class="fa fa-certificate mr-1" aria-hidden="true"></i>Status</a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="wish col-12 wishy-rounded wishy-shadow-box-blue bg-light py-3">
                <h3 class="text-center">You don't have any wishes yet!</h3>
            </div>
        @endif
    @endif

    <script>
        $('.editBtn').click(function() {
            var id = $(this).data('id');
            $('.infoToChange[data-id='+ id +']').toggleClass('hidden');
        })
    </script>
</section>
