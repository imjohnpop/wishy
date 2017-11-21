<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Goals;
use App\UserDetail;
use App\Wishes;
use App\UserHasFriend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {

        $view = view('profile/profile');

        $user = User::find(Auth::user()->id);
        $userDetail = UserDetail::where('user_id', '=', Auth::user()->id)->first();
        $wishes = Wishes::where('user_id', '=', Auth::user()->id)->get();
        $posts = Post::where('user_id', '=', Auth::user()->id)->get();
        $goals = DB::table('user_has_goal')->where('user_id', '=', Auth::user()->id)
                    ->rightJoin('goals', 'user_has_goal.goal_id', '=', 'goals.id')->get();

        $view->user = $user;

        $view->newPassView = view('/newpassword');

        $view->headView = view('profile/head');
        $view->headView->user = $user;
        $view->headView->userDetail = $userDetail;
        $view->headView->wishes = count($wishes);
        $view->headView->goals = count($goals);

        $view->friendView = view('profile/friend');
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

        $view->addmodalView = view('profile/addmodal');
        $view->profiledetailView = view('profile/profiledetail');
        $view->wishgoalnavView = view('profile/wishgoal');

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
        //
        $view = view('profile/profile');

        $user = User::find($id);
        $userDetail = UserDetail::where('user_id', '=', $id)->first();
        $wishes = Wishes::where('user_id', '=', $id)->get();
        $posts = Post::where('user_id', '=', $id)->get();
        $goals = DB::table('user_has_goal')->where('user_id', '=', Auth::user()->id)
                    ->rightJoin('goals', 'user_has_goal.goal_id', '=', 'goals.id')->get();
        
        $user_has_friend = UserHasFriend::select('friend_id')->where('user_id', Auth::user()->id)->get()->toArray();
        $friendships = [];
        foreach ($user_has_friend as $friendship)
        {
            $friendships[] = $friendship['friend_id'];
        }

        $view->user = $user;
        $view->newPassView = view('/newpassword');
        
        $view->headView = view('profile/head', ['user' => $user, 'userDetail' => $userDetail, 'friendships'=>$friendships]);
        $view->headView->wishes = count($wishes);
        $view->headView->goals = count($goals);

        $view->friendView = view('profile/friend', ['friendships'=>$friendships, 'user' => $user]);

        $view->wishesView = view('profile/wishes', ['friendships'=>$friendships, 'user' => $user, 'userDetail' => $userDetail, 'wishes' => $wishes]);

        $view->goalsView = view('profile/goals', ['friendships'=>$friendships, 'user' => $user, 'userDetail' => $userDetail, 'goals' => $goals]);

        $view->postsView = view('profile/posts', ['friendships'=>$friendships, 'user' => $user, 'userDetail' => $userDetail, 'posts' => $posts]);

        $view->addmodalView = view('profile/addmodal');
        $view->profiledetailView = view('profile/profiledetail');
        $view->wishgoalnavView = view('profile/wishgoal', ['friendships'=>$friendships]);

        return $view;
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

        if (empty($user_detail)) {
            $user_detail = new UserDetail();
            $user_detail->fill([
                'country' => $request->input('country'),
                'profile_picture' => $request->file('profile_picture')->storeAs('profilePictures', Auth::user()->id.'.jpg', 'uploads'),
                'quote' => $request->input('quote'),
                'birthday' => $request->input('birthday'),
                'gender' => $request->input('gender'),
                'user_id' => Auth::user()->id,
            ]);
        } else {
            $user_detail = UserDetail::findOrFail(Auth::user()->id);
            $user_detail->update([
                'country' => $request->input('country'),
                'profile_picture' => $request->file('profile_picture')->storeAs('profilePictures', Auth::user()->id.'.jpg', 'uploads'),
                'quote' => $request->input('quote'),
            ]);
        }
        $user_detail->save();

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
