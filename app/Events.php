<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    //
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'date'
    ];
}
