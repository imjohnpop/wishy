<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    //
    public function insert($id)
    {
        $favourite = new Favourite();

        $favourite->user_id = Auth()->user()->id;
        $favourite->place_id = $id;

        $favourite->save();

    }

    public function updatepost()
    {
        
    }

    public function newgoal()
    {
        
    }

    public function updategoal()
    {

    }

    public function destroy()
    {
        
    }
}
