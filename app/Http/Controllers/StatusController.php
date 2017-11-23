<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function wish()
    {
        
    }

    public function goal()
    {
        
    }
}
