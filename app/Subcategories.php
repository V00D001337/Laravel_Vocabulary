<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{
    protected $fillable = [
        'categories_id', 'name', 'description',
        'picture_file_name', 'hidden', 'deleted' 
    ];

    protected $hidden = [
        'id', 'timestamps'
    ];
}
