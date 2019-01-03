<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    protected $fillable = [
        'date', 'percent', 'sets_id', 'users_id'
    ];

    protected $hidden = [
        'id', 'timestamps'
    ];
}
