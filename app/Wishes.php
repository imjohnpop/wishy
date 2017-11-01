<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishes extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'is_public',
        'user_id',
        'status_id',
        'nr_encouragements'
    ];
}
