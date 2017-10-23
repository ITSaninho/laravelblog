<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';


    protected $fillable = [
        'login',
        'parent_id',
        'text',
        'created_at',
        'likes',
        'deslikes',
        //'public',
        'post_id',
        'user_id'
    ];



    public function post() {
        return $this->belongsTo('App\Post');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
