<?php

namespace App\Http\Controllers;

use App\Goals;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoalsController extends Controller
{
    //
    public function view($id)
    {
        if($id) {
            $goal = Goals::find($id);
        } else {
            $goal = new Goals();
        }

        $view = view('profile/planner');

        $view->head = view('profile/head');

        $planner = view('goals/planner');
        $planner->goal = $goal;
        $view->planner = $planner;

        return $view;
    }

    public function edit()
    {

    }

    public function destroy()
    {

    }
}
