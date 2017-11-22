<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goals extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'is_public',
        'nr_encouragements',
        'status_id',
        'user_id',
        'goal_picture'
    ];

    protected $table = 'goals';
}
