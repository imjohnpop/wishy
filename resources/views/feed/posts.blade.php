<section id="posts" class="col-6">
<?php //var_dump($news); ?>

@foreach ($news as $new)
    <?php 
        switch($new['cathegory'])
        {
            case 'goal':
                $comments = $goal_comments;
                break;
            case 'post':
                $comments = $post_comments;
                break;
            case 'wish':
                $comments = [];
                break;
        }
        
        $this_comments = [];
        
        foreach($comments as $comment)
        {
            if($comment['target_id'] == $new['id'])
            {
                $this_comments[] = $comment;
            }
        }

        $nr_comments = count($this_comments);
    ?>
    <div class="post col-12 wishy-rounded wishy-shadow-box-blue bg-light">
        <div class="post-image">
            <img class="wishy-rounded-top" src="img/wish1.jpg" alt="post image">
        </div>
        <div class="wishy-post-info">
            <div class="wishy-user-info">
                <div class="profile-post-thumbnail">
                    <img class="profile-thumbnail img-fluid" src="/uploads/{{ $new['profile_picture'] != null ? $new['profile_picture'] : 'dummy.png' }}" alt="Profile Name">
                </div>
                <div class="wishy-user-text">
                    <h5>{{$new['user_name']}} {{$new['surname']}}</h5>
                    <p>Added at: <span>{{$new['created_at']}}</span></p>
                </div>
                <div class="post-category">
                    <button class="btn wishy-btn menu"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                </div>
            </div>
            <div class="wishy-post-text">
                <h4>@isset($new['name']) {{$new['name']}}@endisset
                </h4>
                <p>@if( isset($new['description'])) {{$new['description']}} @else {{ 'Some description' }} @endif</p>
            </div>
        </div>
        <div class="wishy-post-nav wishy-rounded-bottom">
            @isset($new['tag'])
                <a href="#" title="Status" class="comment ml-3"><i class="fa fa-certificate mr-1" aria-hidden="true"></i>{{$new['tag']}}</a>
            @endisset
            <a href="#" title="Encourage"><i class="fa fa-hand-peace-o mr-1" aria-hidden="true"></i>Encourage ({{$new['nr_encouragements']}})</a>
            @if($new['cathegory']=='goal' || $new['cathegory']=='post')
                <a href="#" title="Comment" class="ml-3"><i class="fa fa-commenting-o mr-1" aria-hidden="true"></i>Comment ({{$nr_comments}})</a>
            @endif
        </div>
        @foreach($this_comments as $this_comment)
            <div class="comments row">
                <img  style="width:3em; height:3em; border-radius:50%;" class="col-2" src="/uploads/{{ $this_comment['profile_picture'] != null ? $this_comment['profile_picture'] : 'dummy.png' }}" alt="Profile picture">            
                <div class="col-9">
                    <h5>{{$this_comment['name']}} {{$this_comment['surname']}}</h5>
                    <p>{{$this_comment['text']}}</p>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
    @endforeach

</section>