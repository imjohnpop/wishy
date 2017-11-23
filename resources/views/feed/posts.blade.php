@foreach ($news as $new)
    <?php
        switch($new['cathegory'])
        {
            case 'goal':
                $comments = $goal_comments;
                $picture = $new['goal_picture'];
                break;
            case 'post':
                $comments = $post_comments;
                $picture = $new['post_picture'];
                break;
            case 'wish':
                $comments = [];
                $picture = $new['wish_picture'];
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

        $has_encouraged = Illuminate\Support\Facades\DB::table('encourage_upload')->where([['user_id', Illuminate\Support\Facades\Auth::user()->id], ['upload_id', $new['id']], ['category', $new['cathegory']]])->first();
    ?>
    <div class="post col-12 wishy-rounded wishy-shadow-box-blue bg-light">
        @if(isset($picture))
            <div class="{{$new['cathegory']}}-image">
                <img class="wishy-rounded-top" src="/uploads/{{$picture}}" alt="{{$new['cathegory']}} image">
            </div>
        @endif
        <div class="wishy-post-info">
            <div class="wishy-user-info">
                <div class="profile-post-thumbnail">
                    <img class="profile-thumbnail img-fluid" src="/uploads/{{ $new['profile_picture'] != null ? $new['profile_picture'] : 'profilePictures/default.jpg' }}" alt="Profile Name">
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
            <div class="nav-links">
                @isset($new['tag'])
                    <a href="#" title="Status" class="status mr-3"><i class="fa fa-certificate mr-1" aria-hidden="true"></i>{{$new['tag']}}</a>
                @endisset
                <a href="#" class="encourage" title="Encourage" data-id="{{ $new['id'] }}" data-category="{{ $new['cathegory'] }}"><i class="fa fa-hand-peace-o mr-1" aria-hidden="true"></i><span class="encourage_text">{{ empty($has_encouraged) ? 'Encourage ' : 'Encouraged ' }}</span><span class="encourage_number">({{$new['nr_encouragements']}})</span></a>
                @if($new['cathegory']=='goal' || $new['cathegory']=='post')
                    <a href="#" title="Comment" class="comment ml-3"><i class="fa fa-commenting-o mr-1" aria-hidden="true"></i>Comment ({{$nr_comments}})</a>
                @endif
            </div>
            @if($new['cathegory']=='goal' || $new['cathegory']=='post')
                <div class="comments row c-form">
                    <form action="{{ action('CommentController@new', ['post_id' => $new['id']])}}" method="post">
                        <input type="text" name="text">
                        <button id="{{$new['cathegory']}}" class="comment" type="submit">Comment</button>
                    </form>
                    <a href="#" title="Close"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
                </div>            
            @endif
        </div>
        <div class="comments" id="comment-section">
            @foreach($this_comments as $this_comment)
                <div class="comments row">
                    <img  style="width:3em; height:3em; border-radius:50%;" class="col-2" src="/uploads/{{ $this_comment['profile_picture'] != null ? $this_comment['profile_picture'] : 'dummy.png' }}" alt="Profile picture">
                    <div class="col-9">
                        <h5>{{$this_comment['name']}} {{$this_comment['surname']}}</h5>
                        <sub>Added at: <span>{{$this_comment['created_at']}}</span></sub>
                        <p>{{$this_comment['text']}}</p>
                        <form action="{{action('CommentController@update', ['id' => $this_comment['id']])}}">
                            <input type="text" name="text" value="{{$this_comment['text']}}">
                            <button class="comment_update" type="submit">Comment</button>
                        </form>
                        @if($this_comment['user_id'] == $current_user_id)
                            <div class="links">
                                <a class="comment_edit" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a class="comment_delete" href="{{action('CommentController@destroy', ['id' => $this_comment['id']])}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </div>
                        @endif
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
    @endforeach
