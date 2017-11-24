<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Comments;

use App\Goals;
use App\Wishes;
use App\Post;

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

    public function trial()
    {
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

        return view('feed/trial', ['news'=>$news]);
    }
}