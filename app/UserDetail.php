<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $table = 'users_detail';
}
