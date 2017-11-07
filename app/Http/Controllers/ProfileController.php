<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $view = view('profile/profile');

        $user = User::find(auth()->user()->id);

        $view->user = $user;
        $view->head = view('profile/head');

        return $view;
    }
}
