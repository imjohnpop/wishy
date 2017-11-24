<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Comments;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function new($id, $type, Request $request)
    {
        $comment = new Comments();
        $comment->fill([
            'user_id' => Auth::user()->id,
            'type' => $type,
            'target_id' => $id,
            'text' => $request->input('text')
        ]);
        $comment->save();

        return redirect()->action('ProfileController@index');
    }

    public function update($id, Request $request)
    {
        $comment = Comments::findOrFail($id);
        $comment->update([
            'text' => $request->input('text')
        ]);
        $comment->save();

        return redirect()->action('ProfileController@index');
    }

    public function destroy($id)
    {
        $comment = Comments::findOrfail($id);

        $comment->delete();

        return redirect()->action('ProfileController@index');        
    }

    public function goals($id)
    {
        $comments = Comments::join('users', 'comments.user_id', '=', 'users.id')
            ->leftjoin('users_detail', 'users.id', '=', 'users_detail.user_id')
            ->select('comments.*', 'users.name', 'users.surname', 'users_detail.profile_picture')
            ->where([['type', 'goal'], ['target_id', $id]])->get()->toArray();
        
        return $comments;
    }
    
    public function posts($id)
    {
        $comments = Comments::join('users', 'comments.user_id', '=', 'users.id')
            ->leftjoin('users_detail', 'users.id', '=', 'users_detail.user_id')
            ->select('comments.*', 'users.name', 'users.surname', 'users_detail.profile_picture')
            ->where([['type', 'post'], ['target_id', $id]])->get()->toArray();
     
        return $comments;
    }
}