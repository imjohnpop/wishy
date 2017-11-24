<section id="posts">
@if (isset($friendships) && array_search($user->id, $friendships) === false)
    <div class="goal col-12 wishy-rounded wishy-shadow-box-blue bg-light">
        <p>Add {{ $user->name }} to view {{ $userDetail->gender == 'female' ? 'her' : 'his' }} posts.</p>
    </div>    
@else
    @if(isset($posts))
        @foreach($posts as $post)
            <?php $has_encouraged = Illuminate\Support\Facades\DB::table('encourage_upload')->where([['user_id', Illuminate\Support\Facades\Auth::user()->id], ['upload_id', $post->id], ['category', $post->cathegory]])->first(); ?>
            <div class="post col-12 wishy-rounded wishy-shadow-box-blue bg-light">
                @if(isset($post->post_picture))
                    <div class="post-image">
                        <img class="wishy-rounded-top" src="/uploads/{{$post->post_picture}}" alt="post image">
                    </div>
                @endif
                <div class="wishy-post-info">
                    <div class="wishy-user-info">
                        <div class="profile-post-thumbnail">
                            <img class="profile-thumbnail img-fluid" src="/uploads/{{ $userDetail != null ? $userDetail->profile_picture : 'profilePictures/default.jpg' }}" alt="Profile Name">
                        </div>
                        <div class="wishy-user-text">
                            <h5>{{ $user->name }} {{ $user->surname }}</h5>
                            <p>Added at: <span>{{ $post->created_at->format('d.m.Y') }}</span></p>
                        </div>
                        <div class="post-category">
                            @if(!isset($friendships))
                                <div class="row" style="width: 90px;">
                                    <button class="btn wishy-btn menu postEditBtn" data-id="{{ $post->id }}"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                    <form action="{{ action('FeedController@destroy', ['id'=> $post->id]) }}" method="post">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn wishy-btn menu"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                    <form action="{{ action('FeedController@update', ['id'=> $post->id]) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="wishy-post-text">
                            <p class="infoToChange" data-id="{{ $post->id }}">{{ $post->text }}</p>
                            <input class="infoToChange hidden form-control" type="text" name="text" value="{{ $post->text }}" data-id="{{ $post->id }}">
                            <div class="form-group infoToChange hidden" data-id="{{ $post->id }}">
                                <label for="post_picture">Post Picture</label>
                                <div class="col">
                                    <input name="post_picture" type="file" class="form-control" id="post_picture" value="{{ $post->post_picture }}">
                                </div>
                            </div>
                            <button type="submit" class="infoToChange hidden form-group btn wishy-btn" data-id="{{ $post->id }}">Save Changes</button>
                        </div>
                    </form>
                </div>
                <div class="wishy-post-nav post wishy-rounded-bottom">
                    <a href="#" class="encourage" title="Encourage"  data-id="{{ $post->id }}" data-category="{{ $post->cathegory }}"><i class="fa fa-hand-peace-o mr-1" aria-hidden="true"></i><span class="encourage_text">{{ empty($has_encouraged) ? 'Encourage ' : 'Encouraged ' }}</span><span class="encourage_number">({{ $post->nr_encouragements }})</span></a>
                    <a href="#" title="Comment" class="comment ml-3"><i class="fa fa-commenting-o mr-1" aria-hidden="true"></i>Comment</a>
                </div>
            </div>
        @endforeach
    @else
        <div class="wish col-12 wishy-rounded wishy-shadow-box-blue bg-light py-3">
            <h3 class="text-center">You don't have any posts yet!</h3>
        </div>
    @endif
@endif

    <script>
        $('.postEditBtn').click(function() {
            var id = $(this).data('id');
            $('.infoToChange[data-id='+ id +']').toggleClass('hidden');
        });
    </script>
</section>