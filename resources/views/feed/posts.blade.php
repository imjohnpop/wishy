<section class="col-6">
    @foreach ($news as $new)
        <div class="post col-12 wishy-rounded wishy-shadow-box-blue bg-light">
            <div class="post-image">
                <img class="wishy-rounded-top" src="img/wish1.jpg" alt="post image">
            </div>
            <div class="wishy-post-info">
                <div class="wishy-user-info">
                    <div class="profile-post-thumbnail">
                        <img class="profile-thumbnail img-fluid" src="/img/profile-photo-mat.jpg" alt="Profile Name">
                    </div>
                    <div class="wishy-user-text">
                        <h5>@if( isset($new['user_name'])) {{$new['user_name']}} @else {{ 'Mat Polak' }} @endif</h5>
                        <p>Added at: <span>{{$new['created_at']}}</span></p>
                    </div>
                    <div class="post-category">
                        <button class="btn wishy-btn menu"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                    </div>
                </div>
                <div class="wishy-post-text">
                    <h4>{{$new['name']}}</h4>
                    <p>{{$new['description']}}</p>
                </div>
            </div>
            <div class="wishy-post-nav wishy-rounded-bottom">
                <a href="#" title="Encourage"><i class="fa fa-hand-peace-o mr-1" aria-hidden="true"></i>Encourage {{$new['nr_encouragements']}}</a>
                <a href="#" title="Comment" class="ml-3"><i class="fa fa-commenting-o mr-1" aria-hidden="true"></i>Comment</a>
            </div>
        </div>
        <?php //var_dump($new);?>
    @endforeach
</section>