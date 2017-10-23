<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';


    protected $fillable = [
        'name',
        'alias',
        'keywords',
        'description',
    ];



    public function posts() {
        return $this->hasMany('App\Post');
    }
}
