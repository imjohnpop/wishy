<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Goals;
use App\Wishes;
use App\Post;

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
        if (Auth::user())
        {
            $view = view('feed/feed');
            $goals = Goals::join('status', 'goals.status_id', '=', 'status.id')
                            ->join('user_has_goal', 'goals.id', '=', 'user_has_goal.goal_id')
                            ->join('users', 'user_has_goal.user_id', '=', 'users.id')
                            ->select('goals.*', 'users.name AS user_name', 'status.tag')
                            ->where('is_public', 1)->get()->toArray();
            $wishes = Wishes::join('status', 'wishes.status_id', '=', 'status.id')
                            ->join('user_has_wish', 'wishes.id', '=', 'user_has_wish.wish_id')
                            ->join('users', 'user_has_wish.user_id', '=', 'users.id')
                            ->select('wishes.*', 'users.name AS user_name', 'status.tag')
                            ->where('is_public', 1)->get()->toArray();
            $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
                            ->select('posts.*', 'users.name AS user_name')
                            ->get()->toArray();
            $news = array_merge($goals, $wishes);
            $news = array_merge($news, $posts);
            $news = collect($news)->sortBy('updated_at')->reverse()->toArray();
            $view->friends = view('feed/friends');
            $posts = view('feed/posts');
            $posts->news = $news;
            $view->posts = $posts;
            $view->events = view('feed/events');
            return $view;
        }
        else 
        {
            $view = view('homepage/homepage');
            return $view;
        }
    }
}
