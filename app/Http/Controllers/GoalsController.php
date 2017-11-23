<?php

namespace App\Http\Controllers;

use App\Checklist;
use App\Goals;
use App\Milestones;
use App\Post;
use App\User;
use App\UserDetail;
use App\UserHasFriend;
use App\UserPicture;
use App\Wishes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GoalsController extends Controller
{
    //
    public function view($id = 'new') {

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
        $head->planner = true;

        // planner element
        $planner->goal = $goal;

        // view in general
        $view->head = $head;
        $view->planner = $planner;



        return $view;
    }

    public function new(Request $request) {
        $goal = new Goals();

        if($_POST['is_public'] == 'on') {
            $public = 1;
        } else {
            $public = 0;
        }

        $goal->fill([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'is_public' => $public,
            'user_id' => Auth::user()->id,
        ]);
        if($request->file('goal_picture')) {
            $goal->goal_picture =$request->file('goal_picture')->storeAs('goalPictures', $request->input('name').Auth::user()->id.'.jpg', 'uploads');
        };
        $goal->name = $_POST['name'];



        $goal->description = $_POST['description'];


        $goal->save();

        return redirect()->action('ProfileController@index');
    }

    public function update($id, Request $request) {
        $goal = Goals::find($id);

        if($_POST['is_public'] == 'on') {
            $public = 1;
        } else {
            $public = 0;
        }

        $oldFile = '/uploads/goalPictures/'. $goal->name . Auth::user()->id .'.jpg';
        if(file_exists("$oldFile")) {
            Storage::delete($oldFile);
        }

        $goal->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'is_public' => $public,
        ]);
        if($request->file('goal_picture')) {
            $goal->goal_picture =$request->file('goal_picture')->storeAs('goalPictures', $request->input('name').Auth::user()->id.'.jpg', 'uploads');
        };

        $goal->save();

        return redirect()->action('GoalsController@view', ['id' => $id]);
    }

    public function complete($id) {
        $goal = Goals::find($id);

        if($goal->status_id !== 3) {
            $post = new Post();
            $post->fill([
                'user_id' => $goal->user_id,
                'post_picture' => $goal->goal_picture,
                'text' => 'Just achieved goal: "' . $goal->name . '"" CONGRATULATION!!',
                'type' => 'text'
            ]);
            $post->save();
        }

        $goal->status_id = 3;
        $goal->save();


    }
    public function destroy($id) {
        $goals = Goals::find($id);
        $checklists = Checklist::where('goal_id', $id)->get();
        $milestones_id = [];
        $milestones = [];

        $goals->delete();
        foreach($checklists as $key => $checklist) {
            $milestones_id[$key] = $checklist['id'];
            $checklist->delete();
        }

        foreach($milestones_id as $key => $milestones_id) {
            $milestones[$key] = Milestones::where('checklist_id', $milestones_id);
        }

        foreach($milestones as $milestone) {
            $milestone->delete();
        }

        return redirect()->action('ProfileController@index');
    }
}
