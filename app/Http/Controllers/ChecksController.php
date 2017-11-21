<?php

namespace App\Http\Controllers;

use App\Checklist;
use App\Checks;
use App\Milestones;
use Illuminate\Http\Request;

class ChecksController extends Controller
{
    public function new($id) {
        $milestone = new Milestones();

        $milestone->fill([
            'text' => request()->input('text'),
            'checklist_id' => $id,
            'is_done' => 0,
        ]);

        $milestone->save();
    }

    public function list($id) {
        $checks = Milestones::where('checklist_id', $id)->get();

        return $checks;
    }

    public function change($id) {
        $milestone = Milestones::find($id);

        if(request()->input('checked') == 'true') {
            $status = 1;
        } else {
            $status = 0;
        }

        var_dump(request()->input('checked'));
        var_dump($status);

        $milestone->fill([
            'is_done' => $status
        ]);

        $milestone->save();
    }

    public function date($id) {
        $milestone = Milestones::find($id);

        $milestone->due_date = request()->input('date');

        var_dump(request()->input('date'));
        $milestone->save();
    }

    public function destroy($id) {
        $checklist = Checklist::find($id);
        $milestones = Milestones::where('checklist_id', $id)->get();
        foreach($milestones as $milestone) {
            $milestone->delete();
        }
        $checklist->delete();
    }
}
