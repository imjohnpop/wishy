<section id="posts">

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
                            <button class="btn wishy-btn menu"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="wishy-post-text">
                        <p>{{ $post->text }}</p>
                    </div>
                </div>
                <div class="wishy-post-nav post wishy-rounded-bottom">
                    <a href="#" class="encourage" title="Encourage"><i class="fa fa-hand-peace-o mr-1" aria-hidden="true"></i>Encourage <span>({{ $post->nr_encouragements }})</span></a>
                    <a href="#" title="Comment" class="comment ml-3"><i class="fa fa-commenting-o mr-1" aria-hidden="true"></i>Comment</a>
                </div>
            </div>
        @endforeach
    @else
        <div class="wish col-12 wishy-rounded wishy-shadow-box-blue bg-light py-3">
            <h3 class="text-center">You don't have any posts yet!</h3>
        </div>
    @endif

</section>