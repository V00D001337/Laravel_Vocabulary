<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name', 'symbol', 'hidden', 'deleted'
    ];

    protected $hidden = [
        'id'
    ];
}
