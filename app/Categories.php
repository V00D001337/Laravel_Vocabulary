<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [
        'name', 'description', 'picture_file_name',
        'hidden', 'deleted' 
    ];

    protected $hidden = [
        'id', 'timestamps'
    ];
}
