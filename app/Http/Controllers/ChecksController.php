<?php

namespace App\Http\Controllers;

use App\Checks;
use App\Milestones;
use Illuminate\Http\Request;

class ChecksController extends Controller
{
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
}
