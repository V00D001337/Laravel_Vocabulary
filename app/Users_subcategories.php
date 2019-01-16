<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users_subcategories extends Model
{
    protected $fillable = [
        'user_id', 'subcategories_id'
    ];

    protected $hidden = [
        'timestamps'
    ];
}
