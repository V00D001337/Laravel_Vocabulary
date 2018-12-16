<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pieczywo extends Model
{
    protected $fillable = [
        'nazwa', 'skladniki'
    ];

    public function piekarz(){
        return $this->hasMany('App\Piekarz', 'specjalnosc');
    }

}
