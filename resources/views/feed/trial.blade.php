<script
        src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>

@foreach ($news as $new)
    <div class="post col-12 wishy-rounded wishy-shadow-box-blue bg-light">
        @if(isset($picture))
            <div class="{{$new['cathegory']}}-image">
                <img class="wishy-rounded-top" src="" alt="image">
            </div>
        @endif
        <div class="wishy-post-info">
            <div class="wishy-user-info">
                <div class="profile-post-thumbnail">
                    <img class="profile-thumbnail img-fluid" src="" alt="">
                </div>
                <div class="wishy-user-text">
                    <a href="profile/"><h5>{{$new['user_name']}} {{$new['surname']}}</h5></a>
                    <p>Added at: <span>{{$new['created_at']}}</span></p>
                </div>
                <div class="post-category">
                    <button class="btn wishy-btn menu news"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                </div>
            </div>
            <div class="wishy-post-text">
                <h4>
                    @isset($new['name'])
                        {{$new['name']}}
                    @endisset
                </h4>
                <p>
                    @if( isset($new['description']))
                        {{$new['description']}}
                    @else
                        {{ 'Some description' }}
                    @endif
                </p>
            </div>
        </div>
        <div class="wishy-post-nav wishy-rounded-bottom">
            @isset($new['tag'])
                <a href="#" title="Status" class="status mr-3"><i class="fa fa-certificate mr-1" aria-hidden="true"></i>{{$new['tag']}}</a>
            @endisset
            <a href="#" class="encourage" title="Encourage" data-id="{{ $new['id'] }}" data-category="{{ $new['cathegory'] }}"><i class="fa fa-hand-peace-o mr-1" aria-hidden="true"></i><span class="encourage_text">{{ empty($has_encouraged) ? 'Encourage ' : 'Encouraged ' }}</span><span class="encourage_number">({{$new['nr_encouragements']}})</span></a>
            @if($new['cathegory']=='goal' || $new['cathegory']=='post')
                <a href="#" title="Comment" class="comment ml-3"><i class="fa fa-commenting-o mr-1" aria-hidden="true"></i>Comment</a>
            @endif
            @if($new['cathegory']=='goal' || $new['cathegory']=='post')
                <form action="{{ action('CommentController@new', ['post_id' => $new['id']])}}" method="post">
                    <input type="text" name="text">
                    <button data-category="{{$new['cathegory']}}" class="comment" type="submit">Comment</button>
                </form>
                <a href="#" title="Close"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
            @endif
        </div>
        <div class="comments" id="comment-list"></div>
    </div>
    <hr>
    @endforeach

    <script src="/js/vendor.bundle.js"></script>
    <script src="/js/comments.bundle.js"></script>
    <!-- BOOTSTRAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <!-- FONTAWESOME -->
<script src="https://use.fontawesome.com/f1003c147a.js"></script>
    <!-- DATEPICKER FOR SAFARI -->

    <!-- OWN SCRIPTS -->
<script src="/js/profile.js"></script>
<script src="/js/actions.js"></script>
<script src="/js/comment.js"></script>
    <!-- FULLCALENDAR -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.6.2/fullcalendar.min.js"></script>
    <!-- SELECT2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.full.js"></script>

