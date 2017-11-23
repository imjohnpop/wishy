<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wishes;
use App\Post;
use App\Goals;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EncourageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function upload(Request $request)
    {
        $has_encouraged = DB::table('encourage_upload')->where([['user_id', Auth::user()->id], ['upload_id', $request->input('id')], ['category', $request->input('category')]])->first();

        if($request->input('category') == 'post') {
            $upload = Post::findOrFail($request->input('id'));
        } else if ($request->input('category') == 'wish') {
            $upload = Wishes::findOrFail($request->input('id'));
        } else if ($request->input('category') == 'goal') {
            $upload = Goals::findOrFail($request->input('id'));
        }

        $nr_encouragements = $upload->nr_encouragements;

        if(empty($has_encouraged)){
            $nr_encouragements = ++$nr_encouragements;
            $has_encouraged = DB::table('encourage_upload')->insert([
                'user_id' => Auth::user()->id,
                'upload_id' => $request->input('id'),
                'category' => $request->input('category')
            ]);
        } else {
            if ($nr_encouragements>0) {
                $nr_encouragements = --$nr_encouragements;
            }
            DB::table('encourage_upload')->where([['user_id', Auth::user()->id], ['upload_id', $request->input('id')], ['category', $request->input('category')]])->delete();
        }

        $upload->update([
            'nr_encouragements' => $nr_encouragements
        ]);
        $upload->save();
        return $nr_encouragements;
    }

}
