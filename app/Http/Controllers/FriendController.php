<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\UserHasFriend;

class FriendController extends Controller
{
    //    
    public function friend($friend_id)
    {
        $friendship = UserHasFriend::select('friend_id')->where([['user_id', Auth::user()->id], ['friend_id', $friend_id]])->get()->toArray();
        
        if(empty($friendship))
        {
            $friendship= new UserHasFriend;
            $friendship->fill([
                'user_id' => Auth::user()->id,
                'friend_id' => $friend_id
            ]);
            $friendship->save();
            
            $friendship= new UserHasFriend;
            $friendship->fill([
                'user_id' => $friend_id,
                'friend_id' => Auth::user()->id
            ]);
            $friendship->save();
        } else {
            $user_id = Auth::user()->id;
            UserHasFriend::where([['user_id', $user_id], ['friend_id', $friend_id]])->delete();
            UserHasFriend::where([['user_id', $friend_id], ['friend_id', $user_id]])->delete();
        }


        return redirect()->action('PofileController@show', ['id' => $friend_id]);        
    }
    
}
