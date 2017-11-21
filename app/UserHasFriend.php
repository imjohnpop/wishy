<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHasFriend extends Model
{
    //
    protected $fillable = [
        'user_id',
        'friend_id'
    ];

    protected $table = 'user_has_friend';
}
