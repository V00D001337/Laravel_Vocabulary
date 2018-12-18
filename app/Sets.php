<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sets extends Model
{
    protected $fillable = [
        'languages1_id', 'languages2_id', 'subcategories_id',
        'users_id', 'name', 'words',
        'number_of_words', 'private', 'validated',
        'deleted'
    ];

    protected $hidden = [
        'id', 'timestamps'
    ];

    public function language1(){
        return $this->belongsTo('App\Languages');
    }
}
