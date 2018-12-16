<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piekarz extends Model
{
    protected $fillable = [
        'imie', 'nazwisko', 'data_zatrudnienia', 'specjalnosc', 'ubezpieczenie'
    ];

    public function pieczywo(){
        return $this->belongsTo('App\Pieczywo');
    }

}
