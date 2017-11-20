<?php

namespace App\Http\Controllers;

use App\Checklist;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    //

    public function new() {

        $checklist = new Checklist();
        $checklist->fill([
            'title' => $_POST['title'],
            'goal_id' => $_POST['goal_id'],
        ]);
        $checklist->save();

    }
}
