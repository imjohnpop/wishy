<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wish;
use App\Comment;
use App\Image;

class TestController extends Controller
{
    public function index() {
        die('Hello');
    }

    public function create() {
        $wish = new Wish();
        $wish->name = 'my new wish';
        $wish->save();
        die('creating...');
    }

}
