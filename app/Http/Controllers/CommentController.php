<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Comments;

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

    public function newpost($post_id, Request $request)
    {
        $comment = new Comments();
        $comment->fill([
            'user_id' => Auth::user()->id,
            'type' => $request->input('category'),
            'target_id' => $post_id,
            'text' => $request->input('text')
        ]);
        $comment->save();

        return redirect()->action('ProfileController@index');
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
