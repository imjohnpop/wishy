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
        'status_id'
    ];

    protected $table = 'goals';
}
