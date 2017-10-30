<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wish;
use App\Comment;
use App\Image;

class TestController extends Controller
{
    public function index() {
        $wish = Wish::all();

        $wish_2 = Wish::find(2);

        $wishes_with_m = Wish::where('name', 'like', 'm%')->get();


        $view = view('test/index');
        $view->wishes_with_m = $wishes_with_m;
        return $view;

    }

    public function create() {
        $wish = new Wish();
        $wish->name = 'my new wish';
        $wish->save();
        die('creating...');
    }

}
