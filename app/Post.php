<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'user_id',
        'type',
        'post_picture',
        'text',
        'nr_encouragements'
    ];
}