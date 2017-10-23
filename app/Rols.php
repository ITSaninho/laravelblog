<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rols extends Model
{
    protected $table = 'rols';

    protected $fillable = [
        'rols',
        'title',
        'keywords',
        'description',
    ];



    public function user() {
        return $this->hasMany('App\User');
    }
}
