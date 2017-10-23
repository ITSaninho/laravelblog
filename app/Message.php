<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';

    protected $fillable = [
        'text',
        'created_at',
        'read_it',
        'whom_id',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
