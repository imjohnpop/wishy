<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wishes;
use App\Post;
use App\Goals;

class EncourageController extends Controller
{
    //
    public function post(Request $request)
    {
        $post = Post::findOrFail($request->input('id'));
        $nr_encouragements = $post->nr_encouragements;
        if($request->input('encouragement') == 'true'){
            $nr_encouragements = ++$nr_encouragements;
        } else {
            if ($nr_encouragements>0) {
                $nr_encouragements = --$nr_encouragements;
            }
        }
        $post->update([
            'nr_encouragements' => $nr_encouragements
        ]);
        $post->save();
        return $nr_encouragements;
    }

    public function wish(Request $request)
    {
        $wish = Wishes::findOrFail($request->input('id'));
        $nr_encouragements = $wish->nr_encouragements;
        if($request->input('encouragement') == 'true'){
            $nr_encouragements = ++$nr_encouragements;
        } else {
            if($nr_encouragements>0){
                $nr_encouragements = --$nr_encouragements;
            }
        }
        $wish->update([
            'nr_encouragements' => $nr_encouragements
        ]);
        $wish->save();
        return $nr_encouragements;

    }

    public function goal(Request $request)
    {
        $goal = Goals::findOrFail($request->input('id'));
        $nr_encouragements = $goal->nr_encouragements;

        if($request->input('encouragement') == 'true'){
            $nr_encouragements = ++$nr_encouragements;
        } else {
            if($nr_encouragements>0){
                $nr_encouragements = --$nr_encouragements;
            }
        }
        $goal->update([
            'nr_encouragements' => $nr_encouragements
        ]);
        $goal->save();
        return $nr_encouragements;

    }
}
