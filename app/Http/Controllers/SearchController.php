<?php

namespace App\Http\Controllers;

use App\Goals;
use App\User;
use App\UserHasFriend;
use App\Wishes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function search() {
        $term = $_GET['q'];

        $users = User::where('users.name', 'LIKE', '%'.$term.'%')->leftJoin('users_detail', 'users_detail.user_id', '=', 'users.id')->get();

        $ids = [];
        $wishes = [];
        $goals = [];
        $friends = [];

        foreach($users as $user) {
            $ids[] = $user['id'];
        }

        foreach($ids as $id){
            $wish = Wishes::where('user_id', $id)->get();
            $wishes[] = $wish;

            $goal = Goals::where('user_id', $id)->get();
            $goals[] = $goal;

            $friend = UserHasFriend::where('user_id', $id)->get();
            $friends[] = $friend;
        }


        foreach($wishes as $key => $wish) {
            $users[$key]->wishes = count($wishes[$key]);
        }

        foreach($goals as $key => $goal) {
            $users[$key]->goals = count($goals[$key]);
        }

        foreach($friends as $key => $friend) {
            $users[$key]->friends = count($friends[$key]);
        }

        return $users;
    }

    public function select($id) {
        $term = $_GET['term'];

        $friends = UserHasFriend::where('user_has_friend.user_id', $id)->leftJoin('users', 'users.id', '=', 'user_has_friend.friend_id')->where('users.name', 'LIKE', $term.'%')->leftJoin('users_detail', 'users_detail.user_id', '=', 'users.id')->get();

        return $friends;
    }
}
