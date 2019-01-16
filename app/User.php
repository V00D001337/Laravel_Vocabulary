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

    public function getAdminAttribute(){
        return $this->user_role && $this->user_role->role->id == 1;
    }

    public function getAtLeastRedactorAttribute(){
        return $this->user_role;
    }

    public function getAtLeastSuperRedactorAttribute(){
        return $this->user_role && $this->user_role->role->id < 3;
    }

}
