<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Goals;
use App\Wishes;

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
            $view = view('feed');
            $goals = Goals::get()->toArray();
            $wishes = Wishes::get()->toArray();
            $news = array_merge($goals, $wishes);
            $news = collect($news)->sortBy('updated_at')->reverse()->toArray();
            $view->news = $news;
            return $view;
        }
        else 
        {
            $view = view('homepage/homepage');
            return $view;
        }
    }
}
