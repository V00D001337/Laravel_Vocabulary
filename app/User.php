<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user_role(){
        return $this->belongsTo('App\User_roles', 'id', 'users_id');
    }

    public function subcategories(){
        return $this->hasMany('App\Users_subcategories', 'users_id', 'id');
    }

    public function getAdminAttribute(){
        return $this->user_role && $this->user_role->role->id == 1;
    }

    public function getRedactorAttribute(){
        return $this->user_role && $this->user_role->role->id == 3;
    }

    public function getSuperRedactorAttribute(){
        return $this->user_role && $this->user_role->role->id == 2;
    }

    public function getAtLeastRedactorAttribute(){
        return $this->user_role;
    }

    public function getAtLeastSuperRedactorAttribute(){
        return $this->user_role && $this->user_role->role->id < 3;
    }

    public function getAtMostRedactorAttribute(){
        return !$this->user_role || $this->user_role->role->id == 3;
    }

    public function getAtMostUserAttribute(){
        return !$this->user_role;
    }

    public function getPermission($id){
        if(!$this->user_role)
            return false;
        // if($this->user_role->role->id == 1)
        //     return true;
        foreach($this->subcategories as $subcategory)
            if($subcategory->subcategories_id == $id)
                return true;
        return false;
    }

}
