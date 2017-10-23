<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolio';

    protected $fillable = [
        'title',
        'img',
        'text',
        'keywords',
        'description',
        'public',
        'created_at',
    ];

}
