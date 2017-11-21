<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestones extends Model
{
    //
    protected $fillable = [
        'text',
        'checklist_id',
        'due_date',
        'is_done',
        'goal_id'
    ];
}
