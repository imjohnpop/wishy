<?php

namespace App\Http\Controllers;

use App\Checklist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    //
    public function get($id)
    {
        $data = Checklist::where('goal_id', $id)->leftJoin('milestones', 'milestones.checklist_id', '=', 'checklist.id')->get();

        return $data;
    }
}
