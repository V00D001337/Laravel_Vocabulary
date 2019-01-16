<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_roles extends Model
{

    protected $primaryKey = null;

    public function role(){
        return $this->belongsTo('App\Roles', 'roles_id', 'id');
    }

}
