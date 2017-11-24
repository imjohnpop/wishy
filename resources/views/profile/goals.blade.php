<section id="goals" class="d-none">
@if (isset($friendships) && array_search($user->id, $friendships) === false)
    <div class="goal col-12 wishy-rounded wishy-shadow-box-blue bg-light">
        <p>Add {{ $user->name }} to view {{ !isset($userDetail->gender) ? 'his/her' : ($userDetail->gender == 'female' ? 'her' : 'his') }} goals.</p>
    </div>    
@else
    @if(isset($goals))
        @foreach($goals as $goal)
            <?php $has_encouraged = Illuminate\Support\Facades\DB::table('encourage_upload')->where([['user_id', Illuminate\Support\Facades\Auth::user()->id], ['upload_id', $goal->id], ['category', $goal->cathegory]])->first(); ?>
            <div class="goal col-12 wishy-rounded wishy-shadow-box-blue bg-light">
                @if(isset($goal->goal_picture))
                    <div class="goal-image">
                        <img class="wishy-rounded-top" src="/uploads/{{$goal->goal_picture}}" alt="goal image">
                    </div>
                @endif
                <div class="wishy-goal-info">
                    <div class="wishy-user-info">
                        <div class="profile-wish-thumbnail">
                            <img class="profile-thumbnail img-fluid" src="/uploads/{{ $userDetail != null ? $userDetail->profile_picture : 'profilePictures/default.jpg' }}" alt="Profile Name">
                        </div>
                        <div class="wishy-user-text">
                            <h5>{{ $user->name }} {{ $user->surname }}</h5>
                            <p>Added at: <span>{{ date('d.m.Y', strtotime($goal->created_at)) }}</span></p>
                        </div>
                        <div class="goal-category">
                        @if (!isset($friendships))
                            <a role="button" href="{{ action('GoalsController@view' , ['id' => $goal->id]) }}" class="btn wishy-btn menu" data-id="{{ $goal->id }}"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                        @endif
                            <p>Category: <span>{{ $goal->cathegory }}</span></p>
                        </div>
                    </div>
                    <div class="wishy-goal-text">
                        <h4>{{ $goal->name }}</h4>
                        <p>{{ $goal->description }}</p>
                    </div>
                </div>
                <div class="wishy-goal-nav goal wishy-rounded-bottom">
                    <a href="#" class="encourage" title="Encourage"  data-id="{{ $goal->id }}" data-category="{{ $goal->cathegory }}"><i class="fa fa-hand-peace-o mr-1" aria-hidden="true"></i><span class="encourage_text">{{ empty($has_encouraged) ? 'Encourage ' : 'Encouraged ' }}</span><span class="encourage_number">({{ $goal->nr_encouragements }})</span></a>
                    <a href="#" title="Comment" class="comment ml-3"><i class="fa fa-commenting-o mr-1" aria-hidden="true"></i>Comment</a>

                    <div class="commenting col-12" data-mat="{{ $goal['id'] }}">

                        <div class="row">
                            <div class="col-11">
                                <form class="w-100" action="{{ action('CommentController@new', ['post_id' => $goal['id'], 'type' => $goal['cathegory']])}}" method="post">
                                    <div class="row">
                                        <div class="col-10">
                                            <input class="w-100" type="text" name="text" placeholder="Add new comment">
                                        </div>
                                        <div class="col-2">
                                            <button data-category="{{$goal['cathegory']}}" class="commenting-buttons btn wishy-btn menu" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-1">
                                <button style="position: static; margin-left: -20px;" title="Close" class="btn wishy-btn menu closingButton" data-mat="{{ $goal['id'] }}"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </div>
                        </div>

                    </div>
                    
                </div>
            </div>
        @endforeach
    @else
        <div class="wish col-12 wishy-rounded wishy-shadow-box-blue bg-light py-3">
            <h3 class="text-center">You don't have any goals yet!</h3>
        </div>
    @endif
@endif
</section>
