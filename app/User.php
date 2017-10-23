<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'user';

    protected $fillable = [
        'name', 'email', 'password', 'status', 'public', 'rols_id', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function messages() {
        return $this->hasMany('App\Messages');
    }

    public function roles() {
        return $this->belongsTo('App\Rols');
    }

    // is admin
    /*
    public function isAdmin()
    {
        if(Auth::user()->rols_id == 3)
        return $this->is_admin; // поле is_admin в таблице users
    }
    */
}
