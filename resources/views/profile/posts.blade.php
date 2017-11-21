<section id="posts">
@if (isset($friendships) && array_search($user->id, $friendships) === false)
    <div class="goal col-12 wishy-rounded wishy-shadow-box-blue bg-light">
        <p>Add {{ $user->name }} to view {{ $userDetail->gender == 'female' ? 'her' : 'his' }} posts.</p>
    </div>    
@else
    @if(isset($posts))
        @foreach($posts as $post)
            <div class="post col-12 wishy-rounded wishy-shadow-box-blue bg-light">
                @if(isset($post->post_picture))
                    <div class="post-image">
                        <img class="wishy-rounded-top" src="/uploads/{{$post->post_picture}}" alt="post image">
                    </div>
                @endif
                <div class="wishy-post-info">
                    <div class="wishy-user-info">
                        <div class="profile-post-thumbnail">
                            <img class="profile-thumbnail img-fluid" src="/uploads/{{ $userDetail != null ? $userDetail->profile_picture : 'dummy.png' }}" alt="Profile Name">
                        </div>
                        <div class="wishy-user-text">
                            <h5>{{ $user->name }} {{ $user->surname }}</h5>
                            <p>Added at: <span>{{ $post->created_at->format('d.m.Y') }}</span></p>
                        </div>
                        <div class="post-category">
                            @if(!isset($friendships))
                                <button class="btn wishy-btn menu"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                            @endif
                        </div>
                    </div>
                    <div class="wishy-post-text">
                        <p>{{ $post->text }}</p>
                    </div>
                </div>
                <div class="wishy-post-nav post wishy-rounded-bottom">
                    <a href="#" class="encourage" title="Encourage"  data-id="{{ $post->id }}" data-category="{{ $post->cathegory }}"><i class="fa fa-hand-peace-o mr-1" aria-hidden="true"></i><span class="encourage_text">Encourage</span> <span class="encourage_number">({{ $post->nr_encouragements }})</span></a>
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
</section>