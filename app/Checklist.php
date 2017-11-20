<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $table = 'checklist';

    protected $fillable = [
        'title',
        'goal_id'
    ];
}
