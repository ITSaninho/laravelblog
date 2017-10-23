<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';

    protected $fillable = [
        'title',
        'img',
        'text',
        'views',
        'likes',
        'deslikes',
        'keywords',
        'description',
        'public',
        'created_at',
        'user_id',
        'category_id',
    ];



    public function user() {
        return $this->belongsTo('App\User');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

}
