<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;

    protected $dates = ['created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
