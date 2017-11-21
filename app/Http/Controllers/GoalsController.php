<?php

namespace App\Http\Controllers;

use App\Goals;
use App\User;
use App\UserDetail;
use App\UserHasFriend;
use App\Wishes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GoalsController extends Controller
{
    //
    public function view($id = 'new')
    {
        if($id !== 'new') {
            $goal = Goals::find($id);
        } else {
            $goal = new Goals();
        }


        // DATABASE
        $user = User::find(Auth::user()->id);
        $goals = Goals::leftJoin('user_has_goal', 'user_has_goal.user_id', '=', 'goals.id')->where('user_has_goal.user_id', Auth::user()->id)->get();
        $wishes = Wishes::where('user_id', '=', Auth::user()->id)->get();
        $userDetail = UserDetail::where('user_id', '=', Auth::user()->id)->first();

        $friends = UserHasFriend::join('users', 'users.id', '=', 'user_has_friend.friend_id')
            ->leftjoin('users_detail', 'users.id', '=', 'users_detail.user_id')
            ->select('users.id', 'users.name AS user_name', 'users.surname', 'users_detail.profile_picture')
            ->where('user_has_friend.user_id', Auth::user()->id)->get()->toArray();

        // VIEWS
        $view = view('profile/planner');
        $planner = view('goals/planner');
        $head = view('profile/head');

        // head element
        $head->userDetail = $userDetail;
        $head->user = $user;
        $head->wishes = count($wishes);
        $head->goals = count($goals);
        $head->nr_friends = count($friends);

        // planner element
        $planner->goal = $goal;

        // view in general
        $view->head = $head;
        $view->planner = $planner;



        return $view;
    }

    public function edit()
    {

    }

    public function destroy()
    {

    }
}
