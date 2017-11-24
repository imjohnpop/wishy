<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Goals;
use App\Wishes;
use App\Post;
use App\Events;
use App\Comments;
use App\UserHasFriend;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            $user = User::findOrFail(Auth::user()->id);
            if ($user->first_login) {
                $user->update([
                    'first_login' => 0,
                ]);
                $user->save();
                $view = view('homepage/firstlogin');
                $view->user = $user;
                $view->newPassView = view('/newpassword');
            } else {
                $goals = Goals::join('status', 'goals.status_id', '=', 'status.id')
                    ->join('users', 'goals.user_id', '=', 'users.id')
                    ->leftjoin('user_has_friend', 'user_has_friend.friend_id', '=', 'users.id')
                    ->leftjoin('users_detail', 'users.id', '=', 'users_detail.user_id')
                    ->select('goals.*', 'users.name AS user_name', 'users.surname', 'status.tag', 'users_detail.profile_picture')
                    ->where([['is_public', 1], ['user_has_friend.user_id', Auth::user()->id]])
                    ->orwhere([['is_public', 1], ['goals.user_id', Auth::user()->id]])->get()->toArray();

                $wishes = Wishes::join('status', 'wishes.status_id', '=', 'status.id')
                    ->join('users', 'wishes.user_id', '=', 'users.id')
                    ->leftjoin('user_has_friend', 'user_has_friend.friend_id', '=', 'users.id')
                    ->leftjoin('users_detail', 'users.id', '=', 'users_detail.user_id')
                    ->select('wishes.*', 'users.name AS user_name', 'users.surname', 'status.tag', 'users_detail.profile_picture')
                    ->where([['is_public', 1], ['user_has_friend.user_id', Auth::user()->id]])
                    ->orwhere([['is_public', 1], ['wishes.user_id', Auth::user()->id]])->get()->toArray();

                $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
                    ->leftjoin('users_detail', 'users.id', '=', 'users_detail.user_id')
                    ->leftjoin('user_has_friend', 'user_has_friend.friend_id', '=', 'users.id')
                    ->select('posts.id', 'posts.text AS description', 'users.name AS user_name', 'users.surname', 'posts.type', 'posts.created_at', 'posts.nr_encouragements', 'posts.cathegory', 'users_detail.profile_picture', 'posts.post_picture')
                    ->where('user_has_friend.user_id', Auth::user()->id)
                    ->orwhere('posts.user_id', Auth::user()->id)->get()->toArray();

                $news = array_merge($goals, $wishes);
                $news = array_merge($news, $posts);
                $news = collect($news)->sortBy('updated_at')->toArray();

                $goal_comments = Comments::join('users', 'comments.user_id', '=', 'users.id')
                    ->leftjoin('users_detail', 'users.id', '=', 'users_detail.user_id')
                    ->select('comments.*', 'users.name', 'users.surname', 'users_detail.profile_picture')
                    ->where('type', 'goal')->get()->toArray();
                $post_comments = Comments::join('users', 'comments.user_id', '=', 'users.id')
                    ->leftjoin('users_detail', 'users.id', '=', 'users_detail.user_id')
                    ->select('comments.*', 'users.name', 'users.surname', 'users_detail.profile_picture')
                    ->where('type', 'post')->get()->toArray();
                $current_user_id = Auth::user()->id;
                
                $view = view('feed/feed');
                $view->newPassView = view('/newpassword');

                $user = User::findOrFail(Auth::user()->id);
                $friends = UserHasFriend::join('users', 'users.id', '=', 'user_has_friend.friend_id')
                    ->leftjoin('users_detail', 'users.id', '=', 'users_detail.user_id')
                    ->select('users.id', 'users.name AS user_name', 'users.surname', 'users_detail.profile_picture')
                    ->where('user_has_friend.user_id', Auth::user()->id)->get()->toArray();
                $friendships[] = $current_user_id;

                $view->friends = view('profile/friend', ['friendships'=>$friendships, 'user' => $user, 'friends'=>$friends]);

                $posts = view('feed/posts', ['goal_comments' => $goal_comments, 'news' => $news, 'post_comments' => $post_comments, 'current_user_id'=>$current_user_id]);
                $view->posts = $posts;
                $events = view('feed/events');
                $events_list = Events::whereMonth('date', date('m'))->get()->toArray();
                $birthdays = UserHasFriend::join('users', 'users.id', '=', 'user_has_friend.friend_id')
                    ->leftjoin('users_detail', 'users.id', '=', 'users_detail.user_id')
                    ->select('users.id', 'users.name', 'users.surname', 'users_detail.birthday AS date')
                    ->where('user_has_friend.user_id', Auth::user()->id)
                    ->whereMonth('users_detail.birthday', date('m'))->get()->toArray();
            
                $events_list = array_merge($events_list, $birthdays);
                $events_list = collect($events_list)->sortBy('date')->reverse()->toArray();
                $events->events_list = $events_list;
                $view->events = $events;
            }
        } else {
            $view = view('homepage/homepage');
            $view->newPassView = view('/newpassword');
        }
        return $view;
    }
}
