<?php

namespace App\Http\Controllers;

use App\Comments;
use App\User;
use App\Post;
use App\Goals;
use App\UserDetail;
use App\Wishes;
use App\UserHasFriend;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {



        $view = view('profile/profile');

        $user = User::find(Auth::user()->id);
        $userDetail = UserDetail::where('user_id', '=', Auth::user()->id)->first();
        $wishes = Wishes::where('user_id', '=', Auth::user()->id)->get();
        $posts = Post::where('user_id', '=', Auth::user()->id)->get();
        $goals = Goals::where('user_id', '=', Auth::user()->id)->get();

        $view->user = $user;

        $view->newPassView = view('/newpassword');

        $friends = UserHasFriend::join('users', 'users.id', '=', 'user_has_friend.friend_id')
        ->leftjoin('users_detail', 'users.id', '=', 'users_detail.user_id')
        ->select('users.id', 'users.name AS user_name', 'users.surname', 'users_detail.profile_picture')
        ->where('user_has_friend.user_id', Auth::user()->id)->get()->toArray();
        
        $view->headView = view('profile/head');
        $view->headView->user = $user;
        $view->headView->userDetail = $userDetail;
        $view->headView->wishes = count($wishes);
        $view->headView->goals = count($goals);
        $view->headView->nr_friends = count($friends);
        
        $view->friendView = view('profile/friend', ['user'=>$user, 'friends'=>$friends]);
        $view->friendView->user = $user;

        $view->wishesView = view('profile/wishes');
        $view->wishesView->user = $user;
        $view->wishesView->userDetail = $userDetail;
        $view->wishesView->wishes = $wishes;

        $view->goalsView = view('profile/goals');
        $view->goalsView->user = $user;
        $view->goalsView->userDetail = $userDetail;
        $view->goalsView->goals = $goals;

        $view->postsView = view('profile/posts');
        $view->postsView->user = $user;
        $view->postsView->userDetail = $userDetail;
        $view->postsView->posts = $posts;

        $view->editModalView = view('profile/editModal');
        $view->editModalView->user = $user;
        $view->usernameView = view('profile/username');
        $view->usernameView->user = $user;

        $view->addmodalView = view('profile/addmodal');
        $view->changepictureView = view('profile/changepicture');
        $view->profiledetailView = view('profile/profiledetail');
        $view->profiledetailView->userDetail = $userDetail;
        $view->changepictureView->userDetail = $userDetail;
        $view->wishgoalnavView = view('profile/wishgoal');

        $goal_comments = Comments::join('users', 'comments.user_id', '=', 'users.id')
            ->leftjoin('users_detail', 'users.id', '=', 'users_detail.user_id')
            ->select('comments.*', 'users.name', 'users.surname', 'users_detail.profile_picture')
            ->where('type', 'goal')->get()->toArray();
        $post_comments = Comments::join('users', 'comments.user_id', '=', 'users.id')
            ->leftjoin('users_detail', 'users.id', '=', 'users_detail.user_id')
            ->select('comments.*', 'users.name', 'users.surname', 'users_detail.profile_picture')
            ->where('type', 'post')->get()->toArray();
        $current_user_id = Auth::user()->id;

        $view->current_user_id = $current_user_id;

        $view->goalsView->goal_comments = $goal_comments;
        $view->postsView->post_comments = $post_comments;
        $view->goalsView->current_user_id = $current_user_id;
        $view->postsView->current_user_id = $current_user_id;

        return $view;
    }

    /**
     * Display the specified profile of a friend.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if($user == null) {
            return redirect('/profile');
        } else {
        $user = User::find($id);
        if(isset($user)) {
            $view = view('profile/profile');
            $userDetail = UserDetail::where('user_id', '=', $id)->first();
            $wishes = Wishes::where('user_id', '=', $id)->get();
            $posts = Post::where('user_id', '=', $id)->get();
            $goals = DB::table('user_has_goal')->where('user_has_goal.user_id', '=', $id)
                ->rightJoin('goals', 'user_has_goal.goal_id', '=', 'goals.id')->get();

            $user_has_friend = UserHasFriend::select('friend_id')->where('user_id', Auth::user()->id)->get()->toArray();
            $friendships = [];
            foreach ($user_has_friend as $friendship) {
                $friendships[] = $friendship['friend_id'];
            }

            $view->user = $user;
            $view->newPassView = view('/newpassword');

            $friends = UserHasFriend::join('users', 'users.id', '=', 'user_has_friend.friend_id')
                ->leftjoin('users_detail', 'users.id', '=', 'users_detail.user_id')
                ->select('users.id', 'users.name AS user_name', 'users.surname', 'users_detail.profile_picture')
                ->where('user_has_friend.user_id', $id)->get()->toArray();

            $view->headView = view('profile/head', ['user' => $user, 'userDetail' => $userDetail, 'friendships' => $friendships]);
            $view->headView->wishes = count($wishes);
            $view->headView->goals = count($goals);
            $view->headView->nr_friends = count($friends);

            $view->friendView = view('profile/friend', ['friendships' => $friendships, 'user' => $user, 'friends' => $friends]);

            $view->wishesView = view('profile/wishes', ['friendships' => $friendships, 'user' => $user, 'userDetail' => $userDetail, 'wishes' => $wishes]);

            $view->goalsView = view('profile/goals', ['friendships' => $friendships, 'user' => $user, 'userDetail' => $userDetail, 'goals' => $goals]);

            $view->postsView = view('profile/posts', ['friendships' => $friendships, 'user' => $user, 'userDetail' => $userDetail, 'posts' => $posts]);

            $view->addmodalView = view('profile/addmodal');
            $view->changepictureView = view('profile/changepicture');
            $view->usernameView = view('profile/username');
            $view->editModalView = view('profile/editModal');
            $view->usernameView->user = $user;
            $view->editModalView->user = $user;
            $view->profiledetailView = view('profile/profiledetail');
            $view->wishgoalnavView = view('profile/wishgoal', ['friendships' => $friendships]);

            $goal_comments = Comments::join('users', 'comments.user_id', '=', 'users.id')
                ->leftjoin('users_detail', 'users.id', '=', 'users_detail.user_id')
                ->select('comments.*', 'users.name', 'users.surname', 'users_detail.profile_picture')
                ->where('type', 'goal')->get()->toArray();
            $post_comments = Comments::join('users', 'comments.user_id', '=', 'users.id')
                ->leftjoin('users_detail', 'users.id', '=', 'users_detail.user_id')
                ->select('comments.*', 'users.name', 'users.surname', 'users_detail.profile_picture')
                ->where('type', 'post')->get()->toArray();
            $view->goalsView->goal_comments = $goal_comments;
            $view->postsView->post_comments = $post_comments;

            return $view;
        }
        }

        return redirect('/profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function store(Request $request) {

        $self = $this;
        if($request->input('category')=='detail') {

            $self->validate($request, [
                'country' => 'string|max:40|nullable',
                'quote' => 'string|max:100|nullable',
                'month' => 'string|max:2|nullable',
                'day' => 'string|max:2|nullable',
                'year' => 'string|max:4|nullable',
                'gender' => 'string|max:6|nullable',
            ]);

            if($request->input("month")<10){
                $month = '0' . $request->input("month");
            } else {
                $month = $request->input("month");
            }

            if($request->input("day")<10){
                $day = '0' . $request->input("day");
            } else {
                $day = $request->input("day");
            }

            $birthday = $request->input("year").'-'.$month.'-'.$day ;

            $user_detail = UserDetail::where('user_id', Auth::user()->id)->first();
            if ($user_detail==null) {
                $user_detail = new UserDetail();
                $user_detail->fill([
                    'country' => $request->input('country'),
                    'quote' => $request->input('quote'),
                    'birthday' => $birthday,
                    'gender' => $request->input('gender'),
                    'user_id' => Auth::user()->id,
                ]);
            } else {
                $user_detail->update([
                    'country' => $request->input('country'),
                    'quote' => $request->input('quote'),
                    'birthday' => $birthday,
                    'gender' => $request->input('gender'),
                ]);
            }
            $user_detail->save();

        } elseif($request->input('category')=='picture') {

            $profilePicture = UserDetail::where('user_id', Auth::user()->id)->first();
            if($request->file('profile_picture')!=null) {
                $file = $request->file('profile_picture')->storeAs('profilePictures', Auth::user()->id . '.jpg', 'uploads');
            } else {
                $file = 'profilePictures/default.jpg';
            }
            if ($profilePicture==null) {
                $profilePicture = new UserDetail();
                $profilePicture->fill([
                    'user_id' => Auth::user()->id,
                    'profile_picture' => "$file",
                ]);
            } else {
                $oldFile = '/uploads/profilePictures/'. Auth::user()->id .'.jpg';
                if(file_exists("$oldFile")) {
                    Storage::delete($oldFile);
                }
                $profilePicture->update([
                    'profile_picture' => "$file",
                ]);
            }
            $profilePicture->save();

        } elseif($request->input('category')=='delete') {

            $profilePicture = UserDetail::where('user_id', Auth::user()->id)->first();
            if ($profilePicture!=null) {
                $file = 'profilePictures/default.jpg';
                $oldFile = '/uploads/profilePictures/'. Auth::user()->id .'.jpg';
                if(file_exists("$oldFile")) {
                    Storage::delete($oldFile);
                }
                $profilePicture->update([
                    'profile_picture' => "$file",
                ]);
            }
            $profilePicture->save();

        } elseif($request->input('category')=='username') {

            $self->validate($request, [
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
            ]);

            $user = User::where('id', Auth::user()->id)->first();
            $user->update([
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
            ]);
            $user->save();

        }

        return redirect()->action('ProfileController@index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
